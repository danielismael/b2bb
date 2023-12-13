<?php

namespace App\Repositors\Quotation;

use App\Interfaces\Quotation\QuotationInterface;
use App\Models\QuotationModel;
use App\Repositors\Quotation\Strategy\status\CompletedStrategy;
use App\Repositors\Quotation\Strategy\status\ProcessingStrategy;
use App\Repositors\Quotation\Strategy\type\RfcTypeStrategy;
use App\Repositors\Quotation\Strategy\type\RfiTypeStrategy;
use App\Repositors\Quotation\Strategy\type\RfqTypeStrategy;
use Illuminate\Support\Facades\Redis;

class QuotationRepository implements QuotationInterface
{
    public function getAllQuotation()
    {
        $cacheKey = 'all_quotations';

        // Verifica se os dados estão em cache
        if (Redis::exists($cacheKey)) {
            // Retorna os dados do cache
            return collect(json_decode(Redis::get($cacheKey), true));
        }

        $collect = QuotationModel::all();

        $data = $collect->map(function ($row) {
            return [
                'id' => $row->id,
                'client_name' => $row->client_name,
                'client_order' => $row->client_order,
                'requested_by' => $row->requested_by,
                'urgent' => $row->urgent,
                'deadline' => date('d/m/Y H:i:s', strtotime($row->deadline)),
                'type' => $this->getTypeStrategy($row->type),
                'status' => $this->getStatuStrategy($row->status),
                'created_at' => date('d/m/Y H:i:s', strtotime($row->created_at)),
                'updated_at' => date('d/m/Y H:i:s', strtotime($row->updated_at)),
            ];
        });

        // Salva os dados no cache por um determinado tempo (ex: 60 segundos)
        Redis::setex($cacheKey, 3360, json_encode($data));

        // Retorna os dados formatados
        return response()->json($data);
    }

    public function getQuotation($id)
    {
        $collect = QuotationModel::findOrFail($id);

        return $collect->map(function ($row) {
            return [
                'id' => $row->id,
                'client_name' => $row->client_name,
                'client_order' => $row->client_order,
                'requested_by' => $row->requested_by,
                'urgent' => $row->urgent,
                'deadline' => date('d/m/Y H:i:s', strtotime($row->deadline)),
                'type' => $this->getTypeStrategy($row->type),
                'status' => $this->getStatuStrategy($row->status),
                'created_at' => date('d/m/Y H:i:s', strtotime($row->created_at)),
            ];
        });
    }

    public function createQuotation($request)
    {
        try {
            $quotation = QuotationModel::create([
                'client_name' => $request['client_name'],
                'client_order' => $request['client_order'],
                'requested_by' => $request['requested_by'],
                'urgent' => $request['urgent'],
                'deadline' => date('Y-m-d H:i:s', strtotime($request['deadline'])),
                'type' => $request['type'],
                'status' => $request['status'],
            ]);
            $quotation->save();

            $response = [
                'response' => 'res',
                'status' => 200
            ];

            return json_encode($response, 200);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateQuotation($request) : bool
    {
        return false;
    }

    public function getTypeStrategy($type) : string
    {
        if ($type == '0') {
            $result = new RfqTypeStrategy();
            $result = $result->getTypeStrategy();
        }
        if ($type == '1') {
            $result = new RfiTypeStrategy();
            $result = $result->getTypeStrategy();
        }
        if ($type == '2') {
            $result = new RfcTypeStrategy();
            $result = $result->getTypeStrategy();
        }
        return $result ?? $type;
    }

    public function getStatuStrategy($status) : string
    {
        if ($status == '0') {
            $result = new ProcessingStrategy();
            $result = $result->getStatus();
        }
        if ($status == '1') {
            $result = new CompletedStrategy();
            $result = $result->getStatus();
        }
        return $result ?? $status;
    }
}

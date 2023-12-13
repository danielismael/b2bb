<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationModel extends Model
{
    use HasFactory;

    protected $table = 'quotation_direct_distributor';

    protected $fillable = [
        'client_name',
        'client_order',
        'requested_by',
        'urgent',
        'deadline',
        'type',
        'status',
    ];
}

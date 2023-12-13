<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerModel extends Model
{
    use HasFactory;

    protected $table = "dealer";

    protected $fillable = [
        "name",
        "allow_quotation",
        "allow_partner",
        "sisrev_llc_code",
        "sisrev_br_code",
    ];
}

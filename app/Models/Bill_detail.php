<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;


    protected $table = "bill_detail";
    protected $primaryKey = "id";
    protected $timestamp = "false";
    public function bills()
    {
        return $this->belongsTo(Bills::class, "id_bill", "id");
    }
    public function products()
    {
        return $this->belongsTo(Products::class, "id_product", "id");
    }
}
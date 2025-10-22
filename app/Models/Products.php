<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    protected $timestamp = "false";
    public function bill_detail()
    {
        return $this->hasMany(Bill_Detail::class, "id_product", "id");
    }
    public function type_products()
    {
        return $this->belongsTo(Type_Products::class, "id_type", "id");
    }
}
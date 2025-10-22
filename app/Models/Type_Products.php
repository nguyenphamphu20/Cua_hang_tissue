<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type_Products extends Model
{
    use HasFactory;
    protected $table = "type_products";
    protected $primaryKey = "id";


    protected $timestamp = "false";
    public function products()
    {
        return $this->hasMany(Products::class, "id_type", "id");
    }
}
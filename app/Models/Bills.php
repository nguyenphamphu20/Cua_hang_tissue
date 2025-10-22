<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bills extends Model
{
    use HasFactory;
    protected $table = "bills";
    protected $primaryKey = "id";
    protected $timestamp = "false";
    public function customer()
    {
        return $this->belongsTo(Customer::class, "id_customer", "id");
    }
    public function bill_detail()
    {
        return $this->hasMany(Bill_Detail::class, "id_bill", "id");
    }
}
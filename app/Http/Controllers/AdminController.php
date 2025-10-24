<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_Products;

class AdminController extends Controller
{
    public function get_index()
    {
        $dsloai = Type_Products::paginate(4);
        return view("admin.loaisanpham.danhsach", compact("dsloai"));
    }
}

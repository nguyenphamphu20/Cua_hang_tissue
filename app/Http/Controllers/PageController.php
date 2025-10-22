<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\Type_Products;
use GuzzleHttp\Handler\Proxy;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Products::where("new", "=", 1)->paginate(4);
        $pro_product = Products::where("promotion_price", "!=", 0)->paginate(8);
        return view("page.trangchu", compact("slide", "new_product", "pro_product"));
    }

    public function getLoaisanpham($type)
    {
        $loai = Products::where("id", "=", $type)->first();
        $danhsach_loai = Products::all();
        $sanpham_theoloai = Products::where("id_type", "=", $type)->get();
        $sanpham_khac = Products::where("id_type", "!=", $type)->paginate(6);
        return view("page.loai_sanpham", compact("loai", "danhsach_loai", "sanpham_theoloai", "sanpham_khac"));
    }

    public function getChitietsanpham()
    {
        return view("page.chitiet_sanpham");
    }

    public function getLienhe()
    {
        return view("page.lienhe");
    }

    public function getGioithieu()
    {
        return view("page.gioithieu");
    }
}
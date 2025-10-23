<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\Type_Products;
use App\Models\Bill_detail;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Products::where("new", "=", 1)->paginate(4, ["*"], "pagenew");
        $pro_product = Products::where("promotion_price", "!=", 0)->paginate(8, ["*"], "pagenew");
        return view("page.trangchu", compact("slide", "new_product", "pro_product"));
    }

    public function getLoaisanpham($id)
    {
        $loai = Products::where("id", "=", $id)->first();
        $danhsach_loai = Products::all();
        $sanpham_theoloai = Products::where("id_type", "=", $id)->get();
        $sanpham_khac = Products::where("id_type", "!=", $id)->paginate(6);
        return view("page.loai_sanpham", compact("loai", "danhsach_loai", "sanpham_theoloai", "sanpham_khac"));
    }

    public function getChitietsanpham($id)
    {
        $sanpham = Products::find($id);
        $sanpham_lienquan = Products::where("id_type", "=", $sanpham->id_type)->paginate(6);
        $sanpham_banchay_query = Bill_detail::selectraw("id_product, sum(quantity) as total")->groupBy("id_product");
        $sanpham_banchay = Products::from('products as p')->joinSub($sanpham_banchay_query, 'top_sales', function ($join) {
            $join->on('p.id', '=', 'top_sales.id_product');
        })->select('p.*', 'top_sales.total')->orderByDesc('total')->get();
        $sanpham_moi = Products::where("new", "=", 1)->take(5)->get();
        return view("page.chitiet_sanpham", compact("sanpham", "sanpham_lienquan", "sanpham_banchay", "sanpham_moi"));
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
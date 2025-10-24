<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Slide;
use App\Models\Products;
use App\Models\Type_Products;
use App\Models\Bill_detail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bills;

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

    public function get_ThemGioHang(Request $req, $id)
    {
        $sanpham = Products::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($sanpham, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function get_XoaGioHang($id)
    {
        $oldcart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function get_DatHang()
    {
        return view('page/dathang');
    }
    public function post_DatHang(Request $req)
    {
        $cart = Session::get('cart');
        $cus = new Customer();
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;
        $cus->address = $req->address;
        $cus->phone_number = $req->phone_number;
        $cus->note = $req->note;
        $cus->save();
        $bill = new Bills();
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');

        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();
        foreach ($cart->items as $key => $value) {
            $bd = new Bill_Detail();
            $bd->id_bill = $bill->id;
            $bd->id_product = $key;
            $bd->quantity = $value['qty'];
            $bd->unit_price = ($value["price"] / $value["qty"]);
            $bd->save();
        }
        Session::forget("cart");
        return view("page/thongbao");
    }
}

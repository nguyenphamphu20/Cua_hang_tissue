<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Slide;
use App\Models\Products;
use App\Models\Type_Products;
use App\Models\Bill_detail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bills;
use App\Models\User;

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

    public function get_TimKiem(Request $req)
    {
        $tukhoa = $req["tukhoa"];
        if (is_numeric($tukhoa)) {
            $dssanpham = Products::where('unit_price', ">=", $tukhoa)->get();
        } else {
            $dssanpham = Products::where('name', 'like', '%' . $tukhoa . '%')->get();
        }
        return view('page/timkiem', compact("dssanpham"));
    }

    public function get_DangKy()
    {
        return view("page/dangky");
    }
    public function post_DangKy(Request $req)
    {
        $val = $req->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'min:8|max:30',
            'repassword' => 'same:password'
        ], [
            'name.required' => "chưa nhập tên",
            'email.email' => 'Địa chỉ thư không đúng định dạng',
            'email.unique' => 'Địa chỉ thư đã có người đăng ký',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
            'password.max' => 'Mật khẩu tối đa 30 ký tự',
            'repassword.same' => 'Mật khẩu không khớp !!!'
        ]);
        $user = new User();
        $user->name = $val["name"];
        $user->email = $val["email"];
        $user->password = Hash::make($val["password"]);
        $user->save();
        return redirect()->back()->with("thongbao", "Đăng ký thành công");
    }

    public function get_DangNhap()
    {
        return view("page/dangnhap");
    }
    public function post_DangNhap(Request $req)

    {
        $val = $req->validate([
            'email' => 'email',
            'password' => 'min:8|max:30',
        ], [
            'email.email' => 'địa chỉ thư không đúng định dạng',
            'password.min' => 'mật khẩu tối thiểu 8 ký tự',
            'password.max' => 'mật khẩu tối đa 30 ký tự',
        ]);
        $chungthuc = array('email' => $val['email'], 'password' => $val['password']);
        if (Auth::attempt($chungthuc)) {
            return redirect()->route("index");
        } else {
            return redirect()->back()->with("thongbao", "Đăng nhập thất bại");
        }
    }
    public function get_DangXuat()
    {
        Auth::logout();
        return redirect()->route("index");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;

class DonDatHangController extends Controller
{
    public function get_index()
    {
        $dsdonhang = Bills::all();
        return view('admin.dondathang.danhsach', compact('dsdonhang'));
    }

    public function get_BillDetail($id)
    {
        $bill = Bills::findOrFail($id);
        return view('admin/dondathang/chitietddh', compact('bill'));
    }
    public function get_UpdateStatus($id)
    {
        $donhang = Bills::find($id);
        $donhang->status = 1;
        $donhang->save();
        return redirect()->route("billindex")->with('thongbao', 'Cập nhật trạng thái đơn hàng thành công');
    }
    public function get_DeleteBill($id)
    {
        // Tìm đơn hàng theo ID
        $donhang = Bills::find($id);
        $donhang->bill_detail()->where("id_bill", $id)->delete();
        $donhang->delete();
        return redirect()->route("billindex")->with('thongbao', "Xoá đơn hàng $donhang->id thành công");
    }
}

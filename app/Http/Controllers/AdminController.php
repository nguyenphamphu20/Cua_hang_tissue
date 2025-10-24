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

    public function get_AddType()
    {
        return view("admin.loaisanpham.themmoi");
    }
    public function post_addtype(Request $req)
    {
        $validationData = $req->validate([
            "name" => "required|string|max:50",
            "description" => "required|string|max:255",
            "image" => "required|image|mimes:jpg,jpeg,png,gif|max:2048"
        ], [
            "name.required" => "Không nhập giá trị rỗng cho tên bánh mì",
            "name.max" => "Tên bánh mì tối đa 50 ký tự",
            "description.required" => "Chưa nhập mô tả loại bánh",
            "image.required" => "Phải chọn hình loại bánh mì nha em",
            "image.image" => "Phải chọn tập tin hình",
            "image.mimes" => "Chỉ chọn các tập tin hình jpg,jpeg,png,gif",
            "image.max" => "Kích thước tập tin tối là 2048MB"
        ]);
        $image = $req->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $loai = new Type_Products();
        $loai->name = $validationData["name"];
        $loai->description = $validationData["description"];
        $loai->image = $imageName;
        $loai->save();
        $image->move("source/image/product", $imageName);
        return redirect()->route("adminindex");
    }

    public function get_EditType($id)
    {

        $type = Type_Products::find($id);
        return view("admin.loaisanpham.sualoai", compact("type"));
    }
    public function post_EditType(Request $req, $id)
    {
        $validationData = $req->validate([
            "name" => "required|string|max:50",
            "description" => "required|string|max:255",
            "image" => "image|mimes:jpg,jpeg,png,gif|max:2048"
        ], [
            "name.required" => "Không nhập giá trị rỗng cho tên bánh mì",
            "name.max" => "Tên bánh mì tối đa 50 ký tự",
            "description.required" => "Chưa nhập mô tả loại bánh",
            "image.image" => "Phải chọn tập tin hình",
            "image.mimes" => "Chỉ chọn các tập tin hình jpg,jpeg,png,gif",
            "image.max" => "Kích thước tập tin tối là 2048MB"
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move("source/image/product", $imageName);
        } else {
            $imageName = $req["fileold"];
        }
        $loai = Type_Products::find($id);
        $loai->name = $validationData["name"];
        $loai->description = $validationData["description"];
        $loai->image = $imageName;
        $loai->save();
        return redirect()->route("adminindex");
    }

    public function get_DeleteType($id)
    {
        $type = Type_Products::find($id);
        if ($type->products()->count() > 0) {
            return redirect()->back()->with("thongbao", "Không xoá được vì loại này đã có sản phẩm");
        } else {
            $type->delete();
            return redirect()->back()->with("thongbao", "Đã xoá loại sản phẩm $type->name");
        }
    }
}

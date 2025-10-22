<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
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
}
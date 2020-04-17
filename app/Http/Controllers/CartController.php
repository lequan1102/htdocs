<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Products;
class CartController extends Controller
{

  /*
  *             1    2     3       4          5 (thuộc tính size, color)    6 (liên kết model)
  * Cart::add( id, name, price, quantity, attributes' => array() )  ->  associate()
  */
  public function index()
  {
    return view('cart.index');
  }
  //thêm mục sản phẩm vào giỏ hàng
  public function store(Request $request)
  {
    if($request->method('POST')){
      $product = Products::find($request->id);
      if($product){
        Cart::add(
          $product->id,
          $product->title,
          $product->price,
          $request->quantity
        )->associate('App\Products');
        return response()->json(
          [
            'total_cart' => Cart::getContent()->count(),
          ]
        );
      }
    }
  }
  //cập nhật mục sản phẩm giỏ hàng
  public function update(Request $request)
  {
    if (Products::find($request->id)){
      Cart::update($request->id,array(
        'name' => $request->name
      ));
    } else {
      return redirect()->back()->with('error','Không tìm thấy sản phẩm bạn cần tìm');
    }
  }
  //Xóa mục sản phẩm trong giỏ hàng
  public function remove(Request $request)
  {
    $product_id = $request->id;
    Cart::remove($product_id);
    return response()->json(
      [
        'total_cart' => Cart::getContent()->count(),
      ]
    );
  }
}

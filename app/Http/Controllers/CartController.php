<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request, int $menu_id){
        
        $cart = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 1 
            ])->first();
        
        $menu = Menu::find($menu_id);
                
        if(empty($cart)){
            $cart = new Cart();

            $cart->user_id = session()->get('currUserSession')->id;
            $cart->status_id = 1;
            $cart->grand_total_price = 0;
            $cart->receiver_name = "";
            $cart->receiver_address = "";
            $cart->check_out_date = date_create('now')->format('Y-m-d');
            $cart->save();
        }

        $cart_item = Cart_item::where([
                'cart_id'=>$cart->id,
                'menu_id'=>$menu_id
            ])->first();

        if(empty($cart_item)){
            $cart_item = new Cart_item();
            $cart_item->cart_id = $cart->id;
            $cart_item->menu_id = $menu_id;
            $cart_item->quantity = $request->quantity;
            $cart_item->total_price = $menu->price * $request->quantity;

        }
        else{
            $cart_item->quantity += $request->quantity;
            $cart_item->total_price += $menu->price * $request->quantity;
        }

        $cart_item->save();    
       
        $cart->grand_total_price = 0;
        foreach($cart->cart_items as $cart_item){
            $cart->grand_total_price += $cart_item->total_price;
        }

        $cart->save();
        
        return redirect(route('cart.list'))->with('message','Successfully add '.$menu->name.' ('.$request->quantity.') to cart.');
    }

    public function cartList(){

        $cart = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 1 
            ])->first();
            
        if(empty($cart)){
            $cart = new Cart();

            $cart->user_id = session()->get('currUserSession')->id;
            $cart->status_id = 1;
            $cart->grand_total_price = 0;
            $cart->receiver_name = "";
            $cart->receiver_address = "";
            $cart->check_out_date = date_create('now')->format('Y-m-d');
            $cart->save();
        }

        $data = [
            'cart' => $cart
        ];

        return view('cart.list', $data);
    }

    public function decrease(int $menu_id){
        $cart = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 1 
            ])->first();
        
        $cart_item = Cart_item::where([
            'cart_id'=>$cart->id,
            'menu_id'=>$menu_id
            ])->first();
        
        if($cart_item->quantity  - 1 == 0){
            return redirect()->back();
        }

        $cart_item->quantity -= 1;
        $cart_item->total_price -= $cart_item->menu->price;
        $cart_item->save();

        $cart->grand_total_price -= $cart_item->menu->price;
        $cart->save();

        $menu = menu::find($menu_id);

        return redirect()->back()->with('message','Successfully decrease quantity '.$menu->name.' -1 in cart.');
    }

    public function increase(int $menu_id){
        $cart = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 1 
            ])->first();
        
        $cart_item = Cart_item::where([
            'cart_id'=>$cart->id,
            'menu_id'=>$menu_id
            ])->first();
        
        $cart_item->quantity += 1;
        $cart_item->total_price += $cart_item->menu->price;
        $cart_item->save();

        $cart->grand_total_price += $cart_item->menu->price;
        $cart->save();

        $menu = menu::find($menu_id);

        return redirect()->back()->with('message','Successfully increase quantity '.$menu->name.' +1 in cart.');
    }

    public function removeFromCart(int $menu_id){
        $cart = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 1 
            ])->first();
        
        $cart_item = Cart_item::where([
            'cart_id'=>$cart->id,
            'menu_id'=>$menu_id
            ])->first();

        $cart->grand_total_price -= $cart_item->total_price;
        $cart->save();

        $cart_item = Cart_item::where([
            'cart_id'=>$cart->id,
            'menu_id'=>$menu_id
            ])->delete();

        $menu = Menu::find($menu_id);

        return redirect()->back()->with('message','Successfully remove '.$menu->name.' from cart.');
    }

    public function checkout(Request $request, int $cart_id){
        
        $rules = [
            'name' => 'required',
            'address' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cart = Cart::find($cart_id);
        $cart->receiver_name = $request->name;
        $cart->receiver_address = $request->address;
        $cart->status_id = 2;
        $cart->check_out_date = date_create('now')->format('Y-m-d');
        $cart->save();

        foreach($cart->cart_items as $cart_item){
            $menu = Menu::find($cart_item->menu_id);

            $menu->sold += $cart_item->quantity;

            $menu->save();
        }

        return redirect(route('menu.index'))->with('message', 'Successfully checkout cart at '.$cart->check_out_date.'.');
    }

    public function historyPage(){
        $carts = Cart::where([
            'user_id' => session()->get('currUserSession')->id,
            'status_id' => 2
            ])->get();
        
        $data = [
            'carts'=>$carts
        ];

        return view('cart.history',$data);
    }
}

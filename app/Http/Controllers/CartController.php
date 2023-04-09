<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\Product;

class CartController extends Controller
{
    public function store(Request $request, $id){
        $cartId = session('cart_id');
        // dd($request->all());
        $cartdata = $request->all();
        $cartqty = $cartdata['qty'];
        $product = product::where('id', $id)->first();
        $row_total = $cartqty * $product->price;
        
        if($cartId){
            Quote::where('cart_id', $cartId)->update(['cart_id' => $cartId]);
            $quote = Quote::where('cart_id', $cartId)->first();
            $quoteId = $quote->id;
            $qdata = [
                'quote_id'   => $quoteId,
                'product_id' => $id,
                'name'       => $product->name,
                'sku'        => $product->sku,
                'price'      => $product->price,
                'qty'        => $cartqty,
                'row_total'  => $row_total,
            ];
            QuoteItem::insert($qdata);
        } else {
            $cartId = Str::random(20);
            session(['cart_id' => $cartId]);

            $data = [
                'cart_id' => $cartId,
            ];
            $quote = Quote::create($data);
            $quoteId = $quote->id;
            $qdata = [
                'quote_id'   => $quoteId,
                'product_id' => $id,
                'name'       => $product->name,
                'sku'        => $product->sku,
                'price'      => $product->price,
                'qty'        => $cartqty,
                'row_total'  => $row_total,
            ];
            QuoteItem::create($qdata);
        } 
        return redirect()->back();
    }

    public function addcart(){
        $cartId = session('cart_id');
        if($cartId){
        $_id = Quote::where('cart_id', $cartId)->first();
        $id = $_id->id;
        $items = QuoteItem::where('quote_id', $id)->get();
        return view('cart', compact('items'));
        }else{
            return view('cart')->with('error', "Your cart is currently empty.");
        }
    }
}

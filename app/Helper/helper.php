<?php

use App\Models\Category;
use App\Models\QuoteItem;
use App\Models\Quote;

if(!function_exists('getmenu')){
    function getmenu(){
        $categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        return $categories;
    }
}

if(!function_exists('totalcartitems')){
    function totalcartitems(){
        $totalcartitems = 0;
        $cartid = session('cart_id');
        if($cartid){
            $quote = Quote::where('cart_id',  $cartid)->first();
            $quoteid = $quote->id;
            $totalcartitems = QuoteItem::where('quote_id',  $quoteid)->sum('qty');
        }
        return $totalcartitems;
    }
    
}


?>
@extends('layouts.website')

@section('section_data')
<h1>Shopping Cart</h1>
<div class="shopping-cart">
    <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
        <label class="product-removal">Remove</label>
        <label class="product-line-price">Total</label>
    </div>
    @if(isset($items))
    @foreach($items as $_items)
        <div class="product">
            <div class="product-image">
                @foreach($_items->products as $_pro)
                <img src="{{ $_pro->getFirstMediaUrl('product_image')}}">
                @endforeach
            </div>
            <div class="product-details">
            <div class="product-title">{{ $_items->name}}</div>
            
            </div>
            <div class="product-price">{{ $_items->price}}</div>
            <div class="product-quantity">
            <input type="number" value="{{ $_items->qty }}" min="1">
            </div>
            <div class="product-removal">
            <button class="remove-product">
                Remove
            </button>
            </div>
            <div class="product-line-price">{{ $_items->row_total}}</div>

        </div>

    @endforeach
    <!-- <div class="product">
        <div class="product-image">
        <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
        </div>
        <div class="product-details">
        <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
        <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
        </div>
        <div class="product-price">45.99</div>
        <div class="product-quantity">
        <input type="number" value="1" min="1">
        </div>
        <div class="product-removal">
        <button class="remove-product">
            Remove
        </button>
        </div>
        <div class="product-line-price">45.99</div>
    </div> -->

    <div class="totals">
        <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">71.97</div>
        </div>
        <div class="totals-item">
        <label>Tax (5%)</label>
        <div class="totals-value" id="cart-tax">3.60</div>
        </div>
        <div class="totals-item">
        <label>Shipping</label>
        <div class="totals-value" id="cart-shipping">15.00</div>
        </div>
        <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">90.57</div>
        </div>
    </div>
      
      <button class="checkout">Checkout</button>

</div>
@endif

@endsection
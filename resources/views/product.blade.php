@extends('layouts.website')

@section('section_data')

<div class="countroner">
    <div class="categorypage">

        <div class="slide-left">

            <h3>PERFUMES CATEGORY</h3>

            <ul>
                <li><a href=""> New arrivals</a> </li>
                <li><a href=""> Best seller</a> </li>
                <li><a href=""> Clearance sales</a> </li>
            </ul>
        </div>
        <div class="product-right1">
            <div class="product-full">
                <div class="product-item">
                    <img src="{{$product->getFirstMediaUrl('product_image')}}" alt="">
                </div>

                <div class="product-item">
                    <h2>{{$product->name}}<span>Gift Cards</span> </h2>
                    <p><b>Brand:</b> Perfumeonline.ca</p>
                    <h3>${{$product->price}}CAD</h3>
                    <p> is not available for purchasing this item ⓘ</p>
                    <form action="">
                        <label for="">Denominations*</label><br>
                        <input type="text" placeholder="$10.00"><br><br>
                    </form>
                    <p>Can't find your product? Questions? Email us and we'll try to get it for you!*Actual product may
                        vary slightly from image. </p>
                    <p><b>Quantity:</b></p>
                    <form action="{{ route('cart',$product->id) }}" method="post">
                          @csrf
                    <div class="qty-group">
                    <input type="number" name="qty" value="1" min="1">
                        <!-- <ul>
                            <li><a href="">-</a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">+</a></li>
                        </ul><br> -->
                        <p><b>Subtotal: $10.00 CAD</b></p>
                            <button id="add-cart"> ADD To CART</button><br>
                        <button id="add-cart">OUT OF STOCK? NOTIFE ME </button><br>
                        <button id="add-wish">ADD To WISHLISt </button><br><br>
                        <p>0 Customers are viewing this product</p>

                    </div>
                    </form>

                </div>

            </div>
            <hr id="phr"> <br><br>
            <div class="cat-banner">
                @foreach($products as $_product)
                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{$_product->getFirstMediaUrl('product_image')}}" width="100%" alt=""></a>
                    <h4>{{$_product->name}}</h4>
                    <p><a href="">Armaf club de nuit intense<span>Men</span></a></p>
                    <h5>from <span>${{$_product->price}} CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>181 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>
                @endforeach

                <!-- <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{ asset('image/amit27.jpg')}}" width="100%" alt=""></a>
                    <h4>NAUTICA</h4>
                    <p><a href=""> Nautica voyage<span>Men</span></a></p>
                    <h5>$48.00 CAD <span>from $9.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>90 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{ asset('image/amit28.webp')}}" width="100%" alt=""></a>
                    <h4>Versace eros</h4>
                    <p><a href="">Versace eros<span>Men</span></a></p>
                    <h5>from <span>$8.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>80 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{ asset('image/amit29.jpg')}}" width="100%" alt=""></a>
                    <h4>GIORGIO ARMANI</h4>
                    <p><a href=""> Acqua di gio<span>Men</span></a></p>
                    <h5>$58.00 CAD <span>$19.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>64 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div> -->
            </div>
        </div>

    </div>

</div>
@endsection
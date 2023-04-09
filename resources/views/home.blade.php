@extends('layouts.website')

@section('section_data')

<div class="container">
    <section class="section1">
        <div class="owl-carousel banner1">
            @foreach($banner as $_banner)
            <div class="item" >
                <a href="{{ route('homepage') }}"><img src="{{$_banner->getFirstMediaUrl('slider_image')}}" alt=""></a>
            </div>
            @endforeach
            <!-- <div class="item">
                <a href="#"><img src="{{asset('image/always-home_99400072-0e46-43cf-8ae8-083953dd4ff0.webp')}}" alt=""></a>
            </div> -->
        </div>
        <h2>Canada's #1 Online Perfume Store</h2>
    </section>
</div>
        <!-- banner1 end -->
<div class="red"></div>
<section class="section2">
    <div class="container">
        <h3>NEW ARRIVALS</h3>
        <div class="owl-carousel banner2">
            @foreach($products as $_product)
                <div class="c-slider">
                    <a href="{{ route('article-list', $_product->url_key)}}"><img src="{{$_product->getFirstMediaUrl('product_image')}}" alt=""></a>
                    <h4><a href="#">{{ $_product->name }}</a></h4>
                    <span><a href="#">Trussardi donna sound of donnas</a></span>
                    <p>${{ $_product->price }} CAD</p>
                    <button><a href="">ADD TO CART</a></button>
                </div>
            @endforeach
            <!-- <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit5.jpeg')}}"></a>
                <h4><a href="#">DEVIDOF</a></h4>
                <span>
                    <a href="#">Davidoff cool water street fighter</a>
                    </span>
                <p>$31.25 CAD</p>
                <button><a href="">ADD TO CART</a></button>
            </div>
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit6.jpeg')}}"></a>
                <h4><a href="#">Versace</a></h4>
                <span> 
                    <a href="#">Armani code parfum</a>
                </span>                        
                <p>$33.15 CAD</p>
                <button><a href="">ADD TO CART</a></button>
            </div>
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit10.png')}}"></a>
                <h4><a href="#">GIORGIO ARMANI</a></h4>
                <span>
                    <a href="#">Armand basi l'eau pour homme</a>
                    </span>
                <p>$23.15 CAD</p>
                <button><a href=""> ADD TO CART</a></button>
            </div>    -->
        </div>
    </div>
</section>

<section class="section2">
    <div class="container">
        <h3>BEST SELLERS</h3>
        <div class="owl-carousel banner2">
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit8.jpeg')}}"></a>
                <h4><a href="#">PERFUMEONLINE.CA</a></h4>
                <span><a href="#">Trussardi donna sound of donna</a></span>
                <p>$33.95 CAD</p>
                <button><a href="">SELECT OPTION</a></button>
            </div>
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit9.jpeg')}}"></a>
                <h4><a href="#">DOLCE GABBANA</a></h4>
                <span>
                    <a href="#">Davidoff cool water street fighter</a>
                    </span>
                <p>$31.25 CAD</p>
                <button><a href="">SELECT OPTION</a></button>
            </div>
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit7.jpeg')}}"></a>
                <h4><a href="#">MANCERA</a></h4>
                <span> 
                    <a href="#">Armani code parfum</a>
                </span>                        
                <p>$33.15 CAD</p>
                <button><a href="3">SELECT OPTION</a></button>
            </div>
            <div class="c-slider">
                <a href="#"><img src="{{ asset('image/amit11.jpg')}}"></a>
                <h4><a href="#">CAROLINA HERRERA</a></h4>
                <span>
                    <a href="#">Armand basi l'eau pour homme</a>
                    </span>
                <p>$23.15 CAD</p>
                <button><a href="">SELECT OPTION</a></button>
            </div>
        </div>
    </div>
</section>
@endsection
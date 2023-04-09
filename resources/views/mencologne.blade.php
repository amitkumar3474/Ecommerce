@extends('layouts.website')

@section('section_data')


<div class="container">
    <div class="categorypage">
        <div class="slide-left">
            <h1>Men's cologne</h1>
            <h3>PERFUMES CATEGORY</h3>

            <ul>
                <li><a href="">New arrivals</a></li>
                <li><a href="">Best seller</a></li>
                <li><a href="">Clearance sales</a></li>
            </ul>
            <h3>SHOP BY BRAND</h3>
            <ul>
                <li><a href="">Abercrombi & fitch</a></li>
                <li><a href="">A lab on fire</a></li>
                <li><a href="">Adidas</a></li>
                <li><a href="">Anatomy</a></li>
                <li><a href="">Arabian oud</a> </li>

                <li><a href="">Visconti di modrone</a> </li>
                <li><a href=""> Worth</a> </li>
                <li><a href=""> Xerjoff</a> </li>
                <li><a href=""> Yardley</a> </li>
                <li><a href=""> Arabian oud</a> </li>
            </ul>
            <h3>SHOP BY PRICE</h3>
            <ul>
                <li><a href="">$20 and under</a> </li>
                <li><a href=""> $20 to $40 </a> </li>
                <li><a href=""> $40 and up</a> </li>

            </ul>
        </div>
        <div class="slide-right">
            <div class="cat-top">
                <img src="{{$category->getFirstMediaUrl('banner_image')}}" alt="">
                <h4>{{ $category->short_description }}</h4>
                <p>{{ $category->description }}</p>
            </div>
            <div class="cat-section">
                <ul>
                    <li><a href="">VIEW AS<ion-icon name="apps-outline"></ion-icon></a></li>
                    <li><a href="">ITEMS PER PAGE <select name="" id="">
                                <option value="">10</option>
                                <option value="">140</option>
                                <option value="">102</option>
                                <option value="">140</option>
                                <option value="">120</option>
                            </select></a></li>
                    <li><a href="">SORT BY <select name="" id="">
                                <option value="">Featured</option>
                                <option value="">Featured</option>
                                <option value="">Featured</option>
                                <option value="">Featured</option>
                            </select></a></li>
                </ul>
            </div>
            <div class="cat-banner">
                @foreach($products as $_product)
                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href="{{ route('article-list', $_product->url_key)}}"><img src="{{$_product->getFirstMediaUrl('product_image')}}" width="100%" alt=""></a>
                    <h4><a href="#">{{ $_product->name }}</a></h4>
                    <p><a href="">Armaf club de nuit intense<span>Men</span></a></p>
                    <h5>from <span>${{ $_product->price }} CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>181 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>
                @endforeach

                <!-- <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit14.png')}}" width="100%" alt=""></a>
                    <h4><a href="#">NAUTICA</a></h4>
                    <p><a href=""> Nautica voyage<span>Men</span></a></p>
                    <h5>$48.00 CAD <span>from $9.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>90 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit15.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">VERSACE Eos</a></h4>
                    <p><a href="">Versace eros<span>Men</span></a></p>
                    <h5>from <span>$8.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>80 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit16.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">GIORGIO ARMANI</a></h4>
                    <p><a href=""> Acqua di gio<span>Men</span></a></p>
                    <h5>$58.00 CAD <span>$19.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>64 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit17.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">MONT BLANC</a></h4>
                    <p><a href=""> Mont blanc legend<span>Men</span></a></p>
                    <h5>$38.00 CAD from <span>$20.45 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>50 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit18.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">DAVIDOFF</a></h4>
                    <p><a href=""> Cool Water<span>Men</span></a></p>
                    <h5>$38.00 CAD <span>$19.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>34 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit19.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">CALVIN KLEIN</a></h4>
                    <p><a href=""> Ck One<span>Men</span></a></p>
                    <h5>Form <span>$12.25 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>70 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit20.png')}}" width="100%"
                            alt=""></a>
                    <h4><a href="#">CALVIN KLEIN</a></h4>
                    <p><a href=""> Ck Eternity<span>Men</span></a></p>
                    <h5>$39.00 CAD Form<span>$18.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>41 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit21.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">MONT BLANC</a></h4>
                    <p><a href=""> Mont Blanc Explorer<span>Men</span></a></p>
                    <h5> Form<span>$15.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>49 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit22.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">JEAN PAUL GAULTIER</a></h4>
                    <p><a href=""> Jean Paul Gaultier Le Male<span>Men</span></a></p>
                    <h5>$39.00 CAD Form<span>$18.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>41 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit23.png')}}" width="100%" alt=""></a>
                    <h4><a href="#">CALVIN KLEIN</a></h4>
                    <p><a href=""> Ck Obsession<span>Men</span></a></p>
                    <h5>Form<span>$12.25 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>41 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div>

                <div class="product1">
                    <span class="sale">Sale</span>
                    <a href=""><img src="{{asset('image/amit24.jpg')}}" width="100%" alt=""></a>
                    <h4><a href="#">CALVIN KLEIN</a></h4>
                    <p><a href=""> Ck Eternity<span>Men</span></a></p>
                    <h5>$39.00 CAD Form<span>$18.95 CAD</span></h5>
                    <img src="img/images.jpg" width="100px" alt=""><span>41 reviews</span><br>
                    <button>SELECT OPTION</button>
                </div> -->

            </div>
        </div>

    </div>
</div>

    @endsection
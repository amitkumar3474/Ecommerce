<nav>
    <div class="user-image">
        <img src="{{ Auth::user()->getFirstMediaUrl('profile_image') }}" alt="">
        <h3>{{Auth::user()->name}}</h3>
        <h4>{{Auth::user()->email}}</h4>
    </div>
    <hr>
    <ul>
        <li><a href="{{ route('dashboard')}}"><i class="fa-sharp fa-solid fa-house"></i>Dashboard</a></li>
        <li><a href="{{ route('student') }}"><i class="fa-solid fa-calendar-days"></i>Students</a></li>
        <li><a href="{{route('user.index')}}"><i class="fa fa-user-group"></i>Users</a></li>
        <!-- <li><a href="#"><i class="fa-solid fa-wallet"></i>Wallet</a></li>
        <li><a href="#"><i class="fa-regular fa-message"></i>Messages</a></li> -->
        <li><a href="{{ route('permission.index')}}"><i class="fa-solid fa-wallet"></i>permission</a></li>
        <li><a href="{{ route('role.index')}}"><i class="fa-solid fa-wallet"></i>Role</a></li>
        <li><a href="{{ route('product.index') }}"><i class="fa-solid fa-wallet"></i>Product</a></li>
        <li><a href="{{ route('page.index') }}"><i class="fa-solid fa-wallet"></i>Page</a></li>
        <li><a href="{{ route('block.index') }}"><i class="fa-solid fa-wallet"></i>Block</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fa-solid fa-wallet"></i>Category</a></li>
        <li><a href="{{ route('banner.index') }}"><i class="fa-solid fa-wallet"></i>Banner</a></li>
    </ul>
    <span><a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a></span>
</nav>
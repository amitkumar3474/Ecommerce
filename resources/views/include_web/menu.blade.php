<nav class="nave">
    <div class="container">
        <ul>
            <li><a href="{{ route('homepage') }}">HOME</a></li>
            @foreach(getmenu() as $_category)
                <li><a href="{{ route('category-list', $_category->url_key) }}">{{ $_category->name }}</a></li>
            @endforeach
       
        </ul>
    </div>
</nav>
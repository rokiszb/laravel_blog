<nav class="navbar navbar-expand-md bg-custom fixed-top">
    <div class="nav-container">
    
        @auth
            <span class="user-name">
                {{ Auth::user()->name }}
            </span>
        @else
            <span class="user-name">
                Hello Guest!
            </span>
        @endauth
        <div class="dropdown show">
            <a class="white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-menu-hamburger glyphicon-custom" aria-hidden="true"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @guest
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>  
                    <a class="dropdown-item" href="{{ action('PostsController@index') }}">Home page</a> 
                @endguest

                @auth
                    <a class="dropdown-item" href="{{ action('PostsController@index') }}">Home page</a>
                    <a class="dropdown-item" href="{{ action('PostsController@create') }}">New blog post</a>
                    <a class="dropdown-item" href="{{ action('PostsController@my_posts') }}">My blog posts</a>
                    <a class="dropdown-item" href="{{ action('\App\Http\Controllers\Auth\LoginController@logout') }}">Logout</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
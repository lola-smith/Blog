<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

<div class="container">
    <a class="navbar-brand" href="/">Brand</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
                <a class="nav-link " href="/posts" >post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('aboutpage')}}">about </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/contact" >contact us</a>
            </li>
        </ul>


         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                            
                            
                            
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                 <a class="dropdown-item"  href="/posts/create">
                                 <i class="fas fa-plus"></i>
                                  writ post
                                   </a>
                                   
                            
                                  <a class="dropdown-item"  href="{{route('home')}}">
                                  <i class="fas fa-gear"></i>
                                    admin
                                   </a>
                            
                            
                                    <hr />

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </div>
    </div>
</nav>
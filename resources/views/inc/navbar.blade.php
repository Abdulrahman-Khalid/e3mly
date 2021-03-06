<nav class="navbar navbar-expand-md navbar-laravel bg-primary" style="margin-bottom:10px;">
    <div class="container">
         @if(Auth::guest())
             <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'E3mly') }}
            </a>
        @elseif(Auth::guard('admin')->check())
        <a class="navbar-brand text-white" href="{{ url('/admin') }}">
            {{ config('app.name', 'E3mly') }}
        </a>
        @elseif(Auth::guard('moderator')->check())
        <a class="navbar-brand text-white" href="{{ url('/moderator') }}">
            {{ config('app.name', 'E3mly') }}
        </a>
        @else 
        <a class="navbar-brand text-white" href="{{ url('/home') }}">
            {{ config('app.name', 'E3mly') }}
        </a>
        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <!--
                    show feedback for both mod. and admins
                    
                    -->
                    
                  
                    @if(Auth::guard('moderator')->check())
                    <li class="nav-item">
                            <a class="nav-link text-white" href="/moderator">All Posts</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link text-white" href="/feedback">Feedbacks Against Posts</a>
                    </li>                     
                    @endif

                    @if(Auth::guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/adminEvent">Update Your Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/profile">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/profile/moderator">Moderators</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/feedback">Feedbacks Against Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin/addnew">Add new Admin</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin">Show Statistics</a>
                        </li>                                             
                    @endif 
                    
                    @if(Auth::guard('web')->check())    
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/posts">View posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/posts/create">Create a Post</a>
                        </li>
                    @endif   
                    
                   
                </ul>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}"><i class="fa fa-sign-in-alt "></i> {{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link text-white" href="{{ route('register') }}"><i class="fa fa-user-plus "></i> {{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/notifications"><span class="fa fa-globe-africa"style="margin-right:5px;"></span>Notifications</a>    
                    </li>

                    <li class ="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                            <li><a class="dropdown-item" href="/home">Dashboard<a></li>
                            <li>
                             @if(Auth::guard('admin')->check())

                             <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout admin') }}
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                            
                             @elseif(Auth::guard('moderator')->check())
                             <a class="dropdown-item" href="{{ route('moderator.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout Moderator') }}
                            </a>
                            <form id="logout-form" action="{{ route('moderator.logout') }}" method="GET" style="display: none;">

                             @elseif(Auth::guard('web')->check())
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                            
                               @endif 
                            </form>
                            
                            @csrf
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
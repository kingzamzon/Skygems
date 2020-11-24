
<!-- tt-mobile menu -->
<nav class="panel-menu" id="mobile-menu">
    <ul>

    </ul>
    <div class="mm-navbtn-names">
        <div class="mm-closebtn">
            Close
            <div class="tt-icon">
                <svg>
                  <use xlink:href="#icon-cancel"></use>
                </svg>
            </div>
        </div>
        <div class="mm-backbtn">Back</div>
    </div>
</nav>
<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                    <a href="{{route('forum.index')}}"><img src="{{ asset('fassets/images/logo.png') }}" alt=""></a>
                </div>
                <!-- /logo -->
                <!-- desctop menu -->
                 <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="{{route('forum.categories')}}"><span>Categories</span></a></li>
                            @if (Auth::check())
                            <li><a href="{{route('forum.create')}}"><span>New</span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                       <svg class="tt-icon">
                          <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                             <button class="tt-search__close">
                               <svg class="tt-icon">
                                  <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto">
                
                {{-- Login user --}}
                @if (Auth::check())
                <div class="tt-user-info d-flex justify-content-center">
                    <a href="#" class="tt-btn-icon">
                         <i class="tt-icon"><svg><use xlink:href="#icon-notification"></use></svg></i>
                    </a>
                    <div class="tt-avatar-icon tt-size-md">
                        <i class="tt-icon"><svg><use xlink:href="#icon-ava-{{\Str::lower(\Str::substr(Auth::user()->name, 0,1))}}"></use></svg></i>
                    </div>
                    <div class="custom-select-01">
                        <select>
                            <option value="Default Sorting">{{Auth::user()->name}}</option>
                            <option onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</option>
                        </select>
                        <form id="logout-form" action="{{ route('forum.auth.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                <div class="tt-account-btn">
                    <a href="{{route('forum.login')}}" class="btn btn-primary">Log in</a>
                </div>
                @endif

            </div>
        </div>
    </div>
</header>
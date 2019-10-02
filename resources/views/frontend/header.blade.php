<div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                @if(Auth::user() && Auth::user()->role=="customer")
                <div class="header__actions">
                    <a href="{{url('/logout')}}">Logout</a>
                </div>
                <div class="header__actions">
                    <p>{{Auth::user()->name}}<p>
                </div>
                @else
                <div class="header__actions">
                    <a href="{{url('/login')}}">Login</a>
                </div>
                  <div class="header__actions">
                    <a href="#" data-url="{{url('/register')}}" data-title="Register" class="create-modal">Register</a>
                  </div>
                @endif

                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
          <div class="header__logo"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/images/shoppinglogo.png')}}" alt="" height="50" weight="100"></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item"><a href="{{url('/')}}">Home</a></li>
                <li class="menu-item"><a href="{{url('/shoePage')}}">Shoes</a></li>
                  <li class="menu-item"><a href="{{url('/clothesPage')}}">Clothes</a></li>
                  <li class="menu-item"><a href="{{url('/accessoriesPage')}}">Accessories</a></li>
                  <li class="menu-item"><a href="{{url('/toysPage')}}">Toys</a></li>
                </ul>
          </div>
          <div class="navigation__column right">
            @if(Auth::user() && Auth::user()->role == "customer")
            <div class="ps-cart"><a class="ps-cart__toggle" href="{{url('/cartsItem')}}"><i class="ps-icon-shopping-cart"></i></a>
            </div>
            @endif
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order</p>
      </div>
    </div>

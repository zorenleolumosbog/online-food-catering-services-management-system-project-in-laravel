<div class="banner">
    <!-- header -->
    <div class="header">
        <div class="w3ls-header" style="background-color: forestgreen;"><!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>Free home delivery at your doorstep</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                        <li class="head-dpdn">
                            <i class="fa fa-phone" aria-hidden="true"></i> Call us: 007-8000
                        </li>

                        @if(Session::get('customer_id'))
                            <li class="head-dpdn">
                                <a href="#" onclick="document.getElementById('customerLogout').submit();">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                                <form action="{{ route('log_out') }}" id="customerLogout" method="POST">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="#signin-modal" data-toggle="modal">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Login
                                </a>
                            </li>
                        @endif

                        @if(Session::get('customer_id'))

                            <li class="head-dpdn" title="View Profile">
                                <a href="{{ route('profile')}}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    {{ Session::get('customer_name') }}
                                </a>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="#sigup-modal" data-toggle="modal">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Register
                                </a>
                            </li>
                        @endif

                       {{-- <li class=" nav-item dropdown">
                            <a href="{{ route('profile')}}"> <i class="#" aria-hidden="true"></i> 🧑 Profile</a>


                        </li>--}}


{{-- <a class="dropdown-item" href="{{route('user-profile')}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="{{route('user.change.password.form')}}">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a> --}}

{{-- <!-- Example split danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger">Action</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div> --}}

                        <li class="head-dpdn">
                            <a href="{{ route('offers')}}"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{ route('help')}}"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>







{{-- <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a>

        </div> --}}


        <!-- //header-one -->
        <!-- navigation -->
        <div class="navigation agiletop-nav" style="background-color:black">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header w3l_logo">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="active" href="{{ url('/') }}">Food Catering Service <span>The Best Food Collection!!!</span></a></h1>
                    </div>

                                      {{-- Menu --}}

                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav navbar-right">
                            {{-- @foreach($categories as $category)
                            <li>
                                <a class="{{ Route::currentRouteName('category_dish') ? 'active' : '' }}" href="{{ route('category_dish', ['category_id'=>$category->category_id]) }}" >
                                    {{$category->category_name}}
                                </a>
                            </li>
                            @endforeach --}}


                         <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3 bg-danger">
										<div class="row ">
											<div class="col-sm-12">
												<ul class="multi-column-dropdown ">
													<h6>Food Type</h6>
													  @foreach($categories as $category)
                            <li>
                                <a class="{{ Route::currentRouteName('category_dish') ? 'active' : '' }}" href="{{ route('category_dish', ['category_id'=>$category->category_id]) }}" >
                                    {{$category->category_name}}
                                </a>
                            </li>
                            @endforeach
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
                            <li><a href="{{ route('about')}}" class="">About Us</a></li>
                            <li><a href="{{ route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>







                    <div class="cart cart box_1">
                        <a href="{{ route('cart_show') }}" class="last">
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
    </div>
    <!-- //header-end -->
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <h2>Delicious Home Made Food from the <br> <span>Best Chefs For you !!!</span></h2>


            {{-- <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="text" placeholder="Enter Your Area Name" required="">
                    <select id="agileinfo_search" name="agileinfo_search" required="">
                        <option value="">Popular Cities</option>
                        <option value="navs">New York</option>
                        <option value="quotes">Los Angeles</option>
                        <option value="videos">Chicago</option>
                        <option value="news">Phoenix</option>
                        <option value="notices">Fort Worth</option>
                        <option value="all">Other</option>
                    </select>
                    <input type="submit" value="Search">
                </form>
            </div> --}}


        </div>
    </div>
</div>

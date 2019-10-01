<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
        <!-- Logo -->
        <a class="nav-brand" href="<?php echo url('/');?>"><img src="{{asset('img/shop-img/logo-web.png')}}" alt="" width="180px" height="40px"></a>
        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>
        <!-- Menu -->
        <div class="classy-menu">
            <!-- close btn -->
            <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>
            <!-- Nav Start -->
            <div class="classynav">
                <ul>
                    <li><a href="/">หน้าแรก</a>
                            <ul class="dropdown">
                                <li><a href="{{url('/')}}">หน้าหลัก</a></li>
                                <li><a href="{{url('/shop')}}">สินค้าทั้งหมด</a></li>
                                {{-- <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li> --}}
                                <li><a href="{{url('/contact')}}">ติดต่อ</a></li>
                            </ul>
                        </li>
                    <li><a href="/shop">สินค้า</a>
                        <div class="megamenu">
                            <ul class="single-mega cn-col-5">
                                <li class="title">เสื้อ</li>
                                <li><a href="/shop">เสื้อเกราะ</a></li>
                                <li><a href="/shop">ชุดเวส</a></li>
                                {{-- <li><a href="/shop">T-shirts</a></li>
                                <li><a href="/shop">Rompers</a></li>
                                <li><a href="/shop">Bras &amp; Panties</a></li> --}}
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">กางเกง</li>
                                <li><a href="/shop">กางเกงขายาว</a></li>
                                <li><a href="/shop">กางเกงขาสั้น</a></li>
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">รองเท้า</li>
                                <li><a href="/shop">รองเท้าฮาฟ</a></li>
                                <li><a href="/shop">รองเท้าคัชชู</a></li>
                                <li><a href="/shop">รองเท้าคอมแบ็ต</a></li>
                                <li><a href="/shop">รองเท้าแทคติคอล</a></li>
                                <li><a href="/shop">รองเท้าเดลต้า</a></li>
                                <li><a href="/shop">รองเท้า 5.11</a></li>
                            </ul>
                            <ul class="single-mega cn-col-5">
                                <li class="title">กระเป๋า</li>
                                <li><a href="/shop">เป้หลัง</a></li>
                                <li><a href="/shop">สะพายไหล่ คาดเอว รัด หิ้ว</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="/contact">ติดต่อเรา</a></li>
                    @if(Session::get('role') == 'admin')
                    <li><a href="/manage">จัดการสินค้า</a>
                        <ul class="dropdown">
                                <li><a href="{{url('/product')}}">เพิ่มสินค้า</a></li>
                                <li><a href="{{url('/manage')}}">แก้ไขสินค้า</a></li>
                                <li><a href="{{url('/manage')}}">ลบสินค้า</a></li>
                                {{-- <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li>
                                <li><a href="contact.html">ติดต่อ</a></li> --}}
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- Nav End -->
        </div>
    </nav>
  
    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
        <!-- Search Area -->
        {{-- <div class="search-area">
            <form action="#" method="post">
                <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div> --}}
        <!-- Favourite Area -->
        <div class="favourite-area">
            {{-- <a href="#"><img src="{{asset('img/core-img/heart.svg')}}" alt=""></a> --}}
            @if(Session::get('user'))
            <a>{{ Session::get('firstname')}}</a>
            @else
            
            <a href="/login"><img src="{{asset('img/core-img/user.svg')}}" alt=""></a>
            @endif
            
        </div>
        <!-- User Login Info -->
        <div class="user-login-info">
                {{-- <li><a href="/login"><img src="{{asset('img/core-img/user.svg')}}" alt=""></a></li> --}}
                @if(Session::get('user'))
                <div>
                        <a href="/logout" style="color:red">logout</a>
                </div>
                
                @endif
        </div>
        <!-- Cart Area -->
        <div class="cart-area">
            <a href="#" id="essenceCartBtn"><img src="{{asset('img/core-img/bag.svg')}}" alt=""> <span></span></a>
        </div>
    </div>
  
  </div>
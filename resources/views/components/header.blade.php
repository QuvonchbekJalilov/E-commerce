<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">jalilovquvonchbek@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">+998 93 588-91-14</a>
            </div>
            <div>
                <a class="text-light" href="https://www.instagram.com/_quvonchbek_jalilov" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://t.me/Jalilov_Quvonchbek" target="_blank"><i class="fa-brands fa-telegram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/in/quvonchbek-jalilov-4a5a61273" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            JKshop
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="\">{{__('Bosh Sahifa')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about')}}">{{__('Biz Haqimizda')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop')}}">{{__('Sotib Olish')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact')}}">{{__('Aloqa')}}</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('myOrder')}}" class="nav-link">{{__('Mening Buyurtmalarim')}}</a>
                    </li>
                    @endauth
                    <?php $all_locales = config('app.all_locales'); ?>
                    

                </ul>
            </div>
            <div class="navbar align-self-center d-flex">

                <a class="nav-icon position-relative text-decoration-none" href="{{ route('viewCart')}}">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?php

                        use Gloudemans\Shoppingcart\Facades\Cart;

                        echo Cart::content()->count() ?></span>
                </a>
                @auth

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="nav-icon position-relative text-decoration-none">
                        <button style="background: none; border: none; cursor: pointer; padding: 0;">
                            <img src="/frontend/assets/img/logouticon.png" alt="Logout" width="23px">
                        </button>
                    </div>
                </form>

                @else
                <div class="nav-icon position-relative text-decoration-none">
                    <a href="{{ route('login')}}"><i class="fa fa-fw fa-user text-dark mr-3"></i></a>
                </div>

                @endauth
                @foreach ($all_locales as  $locale)
                    <div >
                        <a href="{{route('locale.change',['locale'=>$locale])}}" class="nav-link"  style="display: flex;">{{ $locale }}</a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->
<div id="header" class="nh-row">
    <div id="header-row-8" class="nh-row header-top ">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="hottline-email">
                        <ul>
                            <li><i class="fa fa-phone"></i> Hotline: {{ $hotLine }}</li>
                            <li><i class="fa fa-envelope"></i> Email: {{ $email }}</li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-xs-6">
                     <div class="box-search pull-right">
                         <form id="form-suggestion" data-type="products" class="form-inline"
                               action="" method="get"
                               enctype="multipart/form-data">
                             <div class="form-group">
                                 <div class="input-group">
                                     <input type="text" class="form-control search-suggestion"
                                            name="keyword" placeholder="Từ khóa tìm kiếm">
                                 </div>
                                 <button type="submit" class="btn btn-search btn-submit">
                                     <i class="fa fa-search" aria-hidden="true"></i>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>--}}
            </div>
        </div>
    </div>

    <div id="header-row-31" class="nh-row header-bottom ">
        <div class="container">
            <div class="row">

                <div class="col-sm-2 col-xs-2">
                    <div class="navbar-header">
                        <a class="logo" href="#">
                            <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo"/>
                        </a>
                    </div>
                </div>

                <div class="col-sm-10 col-xs-10">
                    <div class="nav_main nav-right  ">
                        <div class="hidden-xs">
                            <nav id="navigation">
                                <ul class="clearfix">
                                    @foreach($categories as $category)
                                        <li class="sub-menu-style1 sub-menu">
                                            <a href="{{ $category->url }}">{{ $category->name }}</a>
                                            @if (count($category->child) > 0)
                                                <ul class="clearfix">
                                                    @foreach($category->child as $child)
                                                        <li>
                                                            <a class=""
                                                               href="{{ route('product.category', ['productCategory' => $child->url]) }}">{{ $child->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>

                        <!--     TODO Mobile                   -->
                        <div class="show-xs hidden">
                            <a class="btn-menu-main btn-toggle-nav ">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                            <div class="menu-mobile cont-toggle-nav">
                                <div id='cssmenu'>
                                    <h2 class="title-category bg-main"> Menu chính
                                        <a href="#" class="btn-toggle-nav btn-close">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </h2>
                                    <ul class="clearfix">
                                        @foreach($categories as $category)
                                            <li class="sub-menu-style1 sub-menu">
                                                <a href="{{ $category->url }}">{{ $category->name }}</a>
                                                @if (count($category->child) > 0)
                                                    <ul class="clearfix">
                                                        @foreach($category->child as $child)
                                                            <li>
                                                                <a href="{{ route('product.category', ['productCategory' => $child->url]) }}">{{ $child->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <script>
                        $(function () {
                            $('a.quy-trinh[href*=#]').on('click', function (e) {
                                e.preventDefault();
                                $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
                            });
                        });
                        $(function () {
                            $('a.thi-cong[href*=#]').on('click', function (e) {
                                e.preventDefault();
                                $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
                            });
                        });
                        $(document).ready(function () {
                            if (window.location.pathname == '/') {
                                $(".nav_main ul li.sub-menu-style2:eq(0) a").attr("href", "#thi-cong");
                                $(".nav_main ul li.sub-menu-style2:eq(0) a").addClass("thi-cong")
                            } else {
                                $(".nav_main ul li.sub-menu-style2:eq(0) a").attr("href", "/#thi-cong");
                            }
                        });
                        $(document).ready(function () {
                            if (window.location.pathname == '/') {
                                $(".nav_main ul li.sub-menu-style2:eq(1) a").attr("href", "#quy-trinh");
                                $(".nav_main ul li.sub-menu-style2:eq(1) a").addClass("quy-trinh")
                            } else {
                                $(".nav_main ul li.sub-menu-style2:eq(1) a").attr("href", "/#quy-trinh");
                            }
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="footer" class="nh-row">
    <div id="footer-row-43" class="nh-row  footer-top ">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-aboutUs">
                        <div class="footer-aboutUs-top"><h3 class="ft-title">Về chúng tôi</h3></div>
                        <div class="footer-aboutUs-bottom">
                            <h2 class="name-company">{{ $companyName }}</h2>
                            <div class="information-content">
                                <ul>
                                    <li>
                                        <b>Địa chỉ:</b>
                                        <div>{{ $address }}</div>
                                    </li>
                                    <li>
                                        <b>Hotline:</b>
                                        <div>{{ $hotline }}</div>
                                    </li>
                                    <li>
                                        <b>Điện thoại:</b>
                                        <div>{{ $phone }}</div>
                                    </li>
                                    <li>
                                        <b>Email: </b>
                                        <div><a href="mailto:{{ $email }}">{{ $email }}</a>
                                        </div>
                                    </li>
                                    <li><b>Website: </b>
                                        <div><a href="{{ $website }}">{{ $website }}</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="item_block">
                        <div class="block-news footer-news"><h3 class="ft-title">Tin mới nhất</h3>
                            <div class="row">
                                <ul>
                                    @foreach($news as $newsItem)
                                        <li class="col-md-12 col-sm-12 col-xs-12  list-item box-blogs">
                                            <div class="item-blogs item-blogs-ft clearfix">
                                                <div class="info info-ft">
                                                    <h2 class="title-blogs-item">
                                                        <a href="/company-introduce/tin-tuc-ve-noi-that.html">{{ $newsItem->title }}</a>
                                                    </h2>
                                                    <p class="more-blogs">
                                                        <span class="time">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            {{ $newsItem->updated_at->format('h:i - d-m-y') }}
                                                        </span>
                                                    </p></div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-fanpage">
                        <div class="footer-fanpage-top"><h3 class="ft-title">Fanpage</h3></div>
                        <div class="footer-fanpage-content">
                            {!! $fanpage !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-row-48" class="nh-row   ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="scroll-top"><a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
                    </div>
                    <script>/* ===== Scroll to Top ====*/
                        $(window).scroll(function () {
                            if ($(this).scrollTop() >= 50) {        /* If page is scrolled more than 50px*/
                                $('#return-to-top').fadeIn(200);    /* Fade in the arrow*/
                            } else {
                                $('#return-to-top').fadeOut(200);   /* Else fade out the arrow*/
                            }
                        });
                        $('#return-to-top').click(function () {      /* When arrow is clicked*/
                            $('body,html').animate({scrollTop: 0                       /* Scroll to top of body*/}, 500);
                        });</script>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-row-52" class="nh-row   ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item_block" style="display: none"
                         data-action="footer/FooterBlock/footerCopyright/9"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-row-34" class="nh-row  custom-option service-category">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="about-us">
                    <div class="aboutUs-title"><h2 class="title-custom">{{ $title }}</h2>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                    </div>
                    <div class="sologan-content">
                        <p>{{ $description }}</p>
                    </div>
                    <div class="aboutUs-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5">
                                <div class="aboutUs-slider">
                                    <div id="slider_about_us" class="slider-product owl-carousel noNav">
                                        @foreach($aboutSliders as $slider)
                                            <div class="item item-aboutUs text-center">
                                                <img src="{{ $getStorageUrl($slider->url) }}"
                                                     alt="{{ $slider->caption }}"/>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7">
                                <div class="aboutUs-text">
                                    {!! $companyIntroduce !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

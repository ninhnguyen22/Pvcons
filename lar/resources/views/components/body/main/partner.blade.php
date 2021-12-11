<div id="content-row-57" class="nh-row   ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="item_block" data-action="partners/Partners/index" data-method="get">
                    <h2 class="title-custom">{{ $title }}</h2>
                    <div class="separator"><span> <i class="fa fa-circle"></i> </span></div>
                    <div class="sologan-content"><p>{{ $description }}</p></div>
                    <div class="content-brand">
                        <div class="tab-content" id="Tab_brand">
                            <div class="tab-pane fade in active" role="tabpanel" id="brand"
                                 aria-labelledby="brand-tab">
                                <div id="Box_brand" class="slider-product owl-carousel noNav owl-theme"
                                     style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper"
                                             style="width: 5346px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-1188px, 0px, 0px);">
                                            @foreach($partners as $partner)
                                                <div class="owl-item" style="width: 297px;">
                                                    <div class="item">
                                                        <a class="item-brand">
                                                            <img
                                                                src="{{ Storage::disk('admin')->url($partner->image) }}"
                                                                alt="{{ $partner->name }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#Box_brand").owlCarousel({
        navigation: true,
        autoPlay: true,
    });
</script>

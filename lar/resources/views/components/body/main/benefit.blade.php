<div id="content-row-50" class="nh-row">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="benefit-we">
                    <div class="benefit-top"><h2 class="title-custom">{{ $title }}</h2>
                        <div class="separator"><span> <i class="fa fa-circle"></i> </span></div>
                        <div class="sologan-content">
                            <p>{{ $description }}</p>
                        </div>
                    </div>
                    <div class="benfit-bottom">
                        <div class="row">
                            @foreach($clientBenefits as $benefit)
                                <div class="col-xs-12 col-sm-6">
                                    <div class="benfit-item">
                                        <div class="benfit-item-img">
                                            <img src="{{ Storage::disk('admin')->url($benefit->image) }}"/>
                                        </div>
                                        <div class="benfit-item-content">
                                            <h3>{{ $benefit->title }}</h3>
                                            <p>{{ $benefit->description }}</p>
                                        </div>
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

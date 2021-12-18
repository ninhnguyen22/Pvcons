<div id="content-row-45" class="nh-row">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="item_block">
                    <div class="list-tab-project box-product-style2">
                        <div class="tabs-block position-relative">
                            <div class="tab-product clearfix">
                                <div class="listTab-title">
                                    <h2 class="title-custom">{{ $title  }}</h2>
                                    <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                                </div>
                                <div class="sologan-content">
                                    <p>{{ $description }}</p>
                                </div>
                                <div class="listTab-option">
                                    <ul class="nav_title clearfix" id="sub-menu01" role="tablist" limit="9"
                                        list-type="list_default" display="tabs" data-col="4" data-row="3">
                                        @foreach($productCategories as $category)
                                            <li role="presentation" class="">
                                                <a class="tab-item"
                                                   href="#tab-block-{{ $category->id }}"
                                                   role="tab" data-toggle="tab"
                                                   aria-expanded="false"
                                                   data-id="{{ $category->id }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-block position-relative" style="margin-top: 30px">
                            <div class="tab-content">
                                @foreach($productCategories as $category)
                                    <div id="tab-block-{{ $category->id }}" class="tab-pane row" loaded="0">
                                        <div class="text-center padding-15 no-data"><p>Chưa có dữ liệu</p></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

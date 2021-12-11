<div class="col-sm-3 col-xs-12">
    <div class="item_block" data-action="navigation/Navigation/category/16" data-method="get">
        <div class="col_left">
            <div class=" box-left box ">
                <div class="title_style">
                    <h3>
                        <i class="fa fa-bars hidden-sm hidden-xs" aria-hidden="true"></i> {{ $title }}
                        <a href="javascript:void(0)" class="btn-view-nav-left fr show-mobile">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </h3>
                    <div class="block-nav-left-mobile hidden-mobile">
                        <nav id="catalog-all-16" class="bs-docs-sidebar side-bar-left border">
                            <ul id="item-pro-ul-16" class="nav bs-docs-sidenav">
                                @foreach($categories as $category)
                                    <li class="border-bottom {{ $active($category) }}">
                                        <a href="{{ $category->productUrl }}" class="">{{ $category->name }}</a>
{{--                                        <a href="/du-an/{{ $category->url }}" class="">{{ $category->name }}</a>--}}
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

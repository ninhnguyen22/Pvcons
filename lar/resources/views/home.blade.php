@extends('layout')
@section('content')
    @isset ($homeSections['carousel'])
        <x-body.main.carousel
            :carousels="$carousels"
        />
    @endisset
    @isset ($homeSections['about'])
        <x-body.main.about
            :aboutSliders="$aboutSliders"
            :companyIntroduce="$companyIntroduce"
            :title="$homeSections['about']['title']"
            :description="$homeSections['about']['description']"
        />
    @endisset
    @isset ($homeSections['product'])
        <x-body.main.product
            :productCategories="$productCategories"
            :title="$homeSections['product']['title']"
            :description="$homeSections['product']['description']"
        />
    @endisset
    @isset ($homeSections['benefit'])
        <x-body.main.benefit
            :clientBenefits="$clientBenefits"
            :title="$homeSections['benefit']['title']"
            :description="$homeSections['benefit']['description']"
        />
    @endisset
    @isset ($homeSections['service'])
        <x-body.main.service
            :services="$services"
            :title="$homeSections['service']['title']"
            :description="$homeSections['service']['description']"
        />
    @endisset
    @isset ($homeSections['workflow'])
        <x-body.main.workflow
            :workflow="$workflow"
            :title="$homeSections['workflow']['title']"
            :description="$homeSections['workflow']['description']"
        />
    @endisset
    @isset ($homeSections['news'])
        <x-body.main.news
            :news="$news"
            :title="$homeSections['news']['title']"
            :description="$homeSections['news']['description']"
        />
    @endisset
    @isset ($homeSections['partner'])
        <x-body.main.partner
            :partners="$partners"
            :title="$homeSections['partner']['title']"
            :description="$homeSections['partner']['description']"
        />
    @endisset
@stop

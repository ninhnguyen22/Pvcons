<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BenefitRepository;
use App\Repositories\BreadcrumbRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CompanyProfileRepository;
use App\Repositories\ContactRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\BenefitRepositoryInterface;
use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\CompanyProfileRepositoryInterface;
use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use App\Repositories\Contracts\HomeRepositoryInterface;
use App\Repositories\Contracts\NewsRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Repositories\FrameRepository;

use App\Repositories\HomeRepository;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        BaseRepositoryInterface::class => BaseRepository::class,
        FrameRepositoryInterface::class => FrameRepository::class,
        CompanyProfileRepositoryInterface::class => CompanyProfileRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
        HomeRepositoryInterface::class => HomeRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        BenefitRepositoryInterface::class => BenefitRepository::class,
        ServiceRepositoryInterface::class => ServiceRepository::class,
        BreadcrumbRepositoryInterface::class => BreadcrumbRepository::class,
        NewsRepositoryInterface::class => NewsRepository::class,
        ContactRepositoryInterface::class => ContactRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Repositories;

use App\Enums\CompanyProfileEnum;
use App\Models\CompanyProfile;
use App\Models\HomeSection;
use App\Models\News;
use App\Models\Partner;
use App\Models\Slide;
use App\Models\WorkFlow;
use App\Repositories\Contracts\HomeRepositoryInterface;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{
    protected Slide $slide;
    protected CompanyProfile $companyProfile;
    protected WorkFlow $workFlow;
    protected News $news;
    protected Partner $partner;
    protected HomeSection $section;

    public function __construct(
        Slide $slide,
        CompanyProfile $companyProfile,
        WorkFlow $workFlow,
        News $news,
        Partner $partner,
        HomeSection $section
    ) {
        parent::__construct();

        $this->slide = $slide;
        $this->companyProfile = $companyProfile;
        $this->workFlow = $workFlow;
        $this->news = $news;
        $this->partner = $partner;
        $this->section = $section;
    }

    public function getCarousels()
    {
        return $this->slide->getHomeCarousels();
    }

    public function getForAbout()
    {
        return $this->slide->getForAbout();
    }

    public function getAboutIntroduce()
    {
        $intro = $this->companyProfile->getByCode(CompanyProfileEnum::from('ABOUT')->value);
        if ($intro) {
            $introArr = explode(PHP_EOL, $intro->value);
            return '<p>' . implode('</p><p>', $introArr) . '</p>';
        }
        return '';
    }

    public function getWorkflow()
    {
        return $this->workFlow->getShow()->get();
    }

    public function getNews()
    {
        return $this->news->getShowForHome()->get();
    }

    public function getPartner()
    {
        return $this->partner->getShow()->get();
    }

    public function getSections()
    {
        $dbSections = $this->section->getShow()->get();
        $sections = [];
        foreach ($dbSections as $section) {
            $sections[$section->code] = [
                'title' => $section->title,
                'description' => $section->description
            ];
        }
        return $sections;
    }

}

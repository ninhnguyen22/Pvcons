<?php

namespace App\Repositories\Contracts;

interface HomeRepositoryInterface extends BaseRepositoryInterface
{
    public function getCarousels();

    public function getForAbout();

    public function getAboutIntroduce();

    public function getWorkflow();

    public function getNews();

    public function getPartner();

    public function getSections();
}

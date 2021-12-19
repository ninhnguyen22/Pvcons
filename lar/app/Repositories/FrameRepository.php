<?php

namespace App\Repositories;

use App\Factories\Head\HeadFactory;
use App\Models\News;
use App\Repositories\Contracts\FrameRepositoryInterface;

class FrameRepository extends BaseRepository implements FrameRepositoryInterface
{
    private HeadFactory $headFactory;
    protected News $news;

    public function __construct(News $news)
    {
        $this->resolvedFactory();
        $this->news = $news;

        parent::__construct();
    }

    public function resolvedFactory()
    {
        $this->headFactory = new HeadFactory();
    }

    public function setHeadTitle(string $title)
    {
        if (!is_null($title)) {
            $this->headFactory->setTitle($title);
        }
    }

    public function setHeadDescription(string $description)
    {
        if (!is_null($description)) {
            $this->headFactory->setDescription($description);
        }
    }

    public function setHeadKeywords(array $keywords)
    {
        if (!empty($keywords)) {
            $this->headFactory->setKeywords($keywords);
        }
    }

    public function getHeadFactory(): HeadFactory
    {
        return $this->headFactory;
    }

    public function getNewsFooter()
    {
        return $this->news->getShowForFooter()->get();
    }

}

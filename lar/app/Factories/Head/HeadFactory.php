<?php

namespace App\Factories\Head;

class HeadFactory
{
    private string $title;
    private string $description;
    private array $keywords = [];

    private HeadMetaGraphFactory $headMetaGraphFactory;

    public function __construct()
    {
        $this->resolveHeadMetaGraphFactory();
    }

    public function getTitle()
    {
        return $this->title ?? config('common.project_name');
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description ?? config('common.description');
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getKeywords()
    {
        $default = config('common.keywords');
        return array_merge($this->keywords, $default);
    }

    public function getKeywordStr()
    {
        $keywords = $this->getKeywords();
        return implode(', ', $keywords);
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    public function getHeadMetaGraphFactory(): HeadMetaGraphFactory
    {
        return $this->headMetaGraphFactory;
    }

    public function setHeadMetaGraphFactory(HeadMetaGraphFactory $headMetaGraphFactory)
    {
        $this->headMetaGraphFactory = $headMetaGraphFactory;
    }

    public function resolveHeadMetaGraphFactory()
    {
        $this->headMetaGraphFactory = new HeadMetaGraphFactory();
    }
}

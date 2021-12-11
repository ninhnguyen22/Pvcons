<?php

namespace App\Factories\Head;

class HeadFactory
{
    private string $title;

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

    public function getHeadMetaGraphFactory(): HeadMetaGraphFactory
    {
        return $this->headMetaGraphFactory;
    }

    public function resolveHeadMetaGraphFactory()
    {
        $this->headMetaGraphFactory = new HeadMetaGraphFactory();
    }
}

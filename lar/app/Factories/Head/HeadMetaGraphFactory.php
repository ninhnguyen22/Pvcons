<?php

namespace App\Factories\Head;

class HeadMetaGraphFactory
{
    private string $ogUrl;
    private string $ogTitle;
    private string $ogDescription;
    private string $ogImage;
    private string $description;
    private array $keywords;

    public function getOgUrl()
    {
        return $this->ogUrl ?? config('common.project_url');
    }

    public function getOgTitle()
    {
        return $this->ogTitle ?? config('common.project_name');
    }

    public function getOgDescription()
    {
        return $this->ogDescription ?? config('common.description');
    }

    public function getOgImage()
    {
        return $this->ogImage ?? config('common.image');
    }

    public function getDescription()
    {
        return $this->description ?? config('common.description');
    }

    public function getKeywords()
    {
        return $this->keywords ?? config('common.keywords');
    }

    public function getKeywordStr()
    {
        $keywords = $this->getKeywords();
        return implode(', ', $keywords);
    }

    public function setOgUrl(string $url)
    {
        $this->ogUrl = $url;
        return $this;
    }

    public function setOgTitle(string $title)
    {
        $this->ogTitle = $title;
        return $this;
    }

    public function setOgDescription(string $description)
    {
        $this->ogDescription = $description;
        return $this;
    }

    public function setOgImage(string $image)
    {
        $this->ogImage = $image;
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setKeywords(string $keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }
}

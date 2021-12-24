<?php

namespace App\Repositories\Contracts;

use App\Factories\Head\HeadFactory;

interface FrameRepositoryInterface extends BaseRepositoryInterface
{
    public function setHeadTitle(string $title);

    public function setHeadDescription(string $description);

    public function setHeadKeywords(array $keywords);

    public function getHeadFactory(): HeadFactory;

    public function getNewsFooter();

    public function setHeadMetaGraph($headMetaGraphFactory);
}

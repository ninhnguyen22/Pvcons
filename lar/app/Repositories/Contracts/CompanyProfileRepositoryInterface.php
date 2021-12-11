<?php

namespace App\Repositories\Contracts;

interface CompanyProfileRepositoryInterface extends BaseRepositoryInterface
{
    public function getName(): string;

    public function getPhone1(): string;

    public function getPhone2(): string;

    public function getEmail(): string;

    public function getAddress(): string;

    public function getWebsite(): string;

    public function getPage(): string;

    public function getMap(): string;
}

<?php

namespace App\Repositories;

use App\Enums\CompanyProfileEnum;
use App\Models\CompanyProfile;
use App\Repositories\Contracts\CompanyProfileRepositoryInterface;

class CompanyProfileRepository extends BaseRepository implements CompanyProfileRepositoryInterface
{
    protected CompanyProfile $companyProfile;

    public function __construct(CompanyProfile $companyProfile)
    {
        parent::__construct();

        $this->companyProfile = $companyProfile;
    }

    protected function getByCode($code)
    {
        return $this->companyProfile
            ->getByCode($code);
    }

    protected function getValueByCode($code)
    {
        $profile = $this->getByCode($code);
        return $profile ? $profile->value : null;
    }

    public function getName(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('COMPANY_NAME')->value);
    }

    public function getAddress(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('ADDRESS')->value);
    }

    public function getEmail(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('EMAIL')->value);
    }

    public function getPhone1(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('PHONE1')->value);
    }

    public function getPhone2(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('PHONE2')->value);
    }

    public function getPage(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('PAGE')->value);
    }

    public function getWebsite(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('WEBSITE')->value);
    }

    public function getMap(): string
    {
        return $this->getValueByCode(CompanyProfileEnum::from('MAP')->value);
    }

}

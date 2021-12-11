<?php

namespace App\Repositories;

use App\Models\ClientBenefit;
use App\Repositories\Contracts\BenefitRepositoryInterface;

class BenefitRepository extends BaseRepository implements BenefitRepositoryInterface
{
    protected ClientBenefit $clientBenefit;

    public function __construct(ClientBenefit $clientBenefit)
    {
        parent::__construct();

        $this->clientBenefit = $clientBenefit;
    }

    public function getClientBenefit()
    {
        return $this->clientBenefit->getShow()->get();
    }

}

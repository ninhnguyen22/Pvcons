<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Slide;
use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public Slide $slide;
    public Contact $contact;

    public function __construct(Slide $slide, Contact $contact)
    {
        parent::__construct();

        $this->slide = $slide;
        $this->contact = $contact;
    }

    public function getCompanyImg()
    {
        return $this->slide->getAboutLasted();
    }

    public function saveContact($input)
    {
        return $this->contact->create($input);
    }

}

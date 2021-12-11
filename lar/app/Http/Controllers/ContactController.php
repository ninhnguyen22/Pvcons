<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BreadcrumbRepositoryInterface;
use App\Repositories\Contracts\CompanyProfileRepositoryInterface;
use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Repositories\Contracts\FrameRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public FrameRepositoryInterface $frameRepository;
    public BreadcrumbRepositoryInterface $breadcrumbRepository;
    public CompanyProfileRepositoryInterface $companyProfileRepository;
    public ContactRepositoryInterface $contactRepository;

    public function __construct(
        FrameRepositoryInterface $frameRepository,
        BreadcrumbRepositoryInterface $breadcrumbRepository,
        CompanyProfileRepositoryInterface $companyProfileRepository,
        ContactRepositoryInterface $contactRepository
    ) {
        parent::__construct();

        $this->frameRepository = $frameRepository;
        $this->breadcrumbRepository = $breadcrumbRepository;
        $this->companyProfileRepository = $companyProfileRepository;
        $this->contactRepository = $contactRepository;
    }

    public function show()
    {
        $this->frameRepository->setHeadTitle('Liên Hệ');
        $this->categoryBreadcrumbs([
            'name' => 'Liên hệ',
            'url' => route('contact.show')
        ]);
        $companyName = $this->companyProfileRepository->getName();
        $companyImg = '';
        $slide = $this->contactRepository->getCompanyImg();
        if ($slide) {
            $companyImg = $slide->url;
        }

        $map = $this->companyProfileRepository->getMap();

        return view('contact', compact('companyName', 'companyImg', 'map'));
    }

    public function store(Request $request)
    {
        if ($this->contactRepository->saveContact($request->all())) {
            return redirect()->route('contact.show')->with('flash', [
                'status' => 'success',
                'msg' => 'Gửi liên hệ thành công, chúng tôi sẽ liên hệ với bạn sớm nhất'
            ]);
        }
        return redirect()->route('contact.show')->with('flash', [
            'status' => 'error',
            'msg' => 'Gửi liên hệ thất bại, vui lòng thực hiện lại'
        ]);
    }

}

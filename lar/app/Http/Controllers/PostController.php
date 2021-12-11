<?php

namespace App\Http\Controllers;

use App\Enums\CompanyProfileEnum;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {
        $all = CompanyProfileEnum::from('COMPANY_NAME');
        dd($all);
    }
}

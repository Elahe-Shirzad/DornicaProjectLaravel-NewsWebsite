<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatus;
use App\Models\News;

class IndexController extends Controller
{
    public function index()
    {

        $newsItems=News::query()
            ->where('status','=',NewsStatus::PUBLISH)
            ->applySearch()
            ->applysort()
            ->paginate()
            ->withQueryString();


        return view('index',[
            'title' => 'صفحه اصلی',
            'newsItems' =>$newsItems
        ]);

    }
}

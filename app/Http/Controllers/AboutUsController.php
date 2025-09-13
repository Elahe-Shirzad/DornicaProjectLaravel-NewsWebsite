<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatus;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $authorRole=AdminRole::query()

            ->where('name', '=', 'author')
            ->value('id');
        $authors = Admin::query()
            ->where('admin_role_id','=',$authorRole)
            ->withCount(['news'=>function ($query)
            {
                $query
                    ->where('status','=',NewsStatus::PUBLISH);
            }])
            ->orderByDesc('created_at')
            ->paginate();



        return view('about-us', [
            'title' => ' درباره ما',
            'authors' => $authors,
        ]);
    }
}

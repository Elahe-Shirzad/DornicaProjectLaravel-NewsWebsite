<?php

namespace App\Http\Controllers\News;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(int $categoryId)
    {
        $category = NewsCategory::findOrFail($categoryId);

        $newsItems =
            $category->news()
                ->where('status', NewsStatus::PUBLISH)
                ->applySearch()
                ->applysort()
                ->paginate()
                ->withQueryString();

        return view('news.category', [
            'title' => $category->name . ' | دسته بندی خبرها',
            'category' => $category,
            'newsItems' => $newsItems,

        ]);

    }
}

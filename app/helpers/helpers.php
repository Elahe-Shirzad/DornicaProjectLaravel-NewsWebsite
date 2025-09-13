<?php

use App\Models\Admin;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


if (!function_exists('backWithError')) {

    function backWithError(string $message): RedirectResponse
    {
        return back()
            ->withErrors([
                'errorMessage' => $message
            ]);
    }
}


if (!function_exists('convertEnumCasesToString')) {
    function convertEnumCasesToString($enumClass): string
    {
        $string = [];
        foreach ($enumClass::cases() as $case) {
            $string[] = $case->value;
        }
        return implode(',', $string);

    }
}


if (!function_exists('getCategoriesName'))
{
     function getCategoriesName()
    {

       return
           NewsCategory::query()
           ->orderByDesc('name')
           ->get()
           ->toArray();

    }
}




if (!function_exists('dateTimeWithMonthName')) {
    function dateTimeWithMonthName($dateTime): string
    {
        $jalaliDate = $dateTime->toJalali();
        return $jalaliDate->format('j') . ' ' . $jalaliDate->format('F') . ' ' . $jalaliDate->format('Y');
    }
}


if (!function_exists('isSortSelected')) {

    function isSortSelected(string $key, bool $default = false): bool
    {
        if (request()->missing('sort') && $default) {
            return true;
        }

        return request()->query('sort') == $key;
    }
}



if (!function_exists('activeSidebarItem')) {

    function activeSidebarItem(string|array $targetRouteNames, string $class = "active"): string
    {
        $currentRouteName = Route::currentRouteName();
        if (is_string($targetRouteNames)) {
            $targetRouteNames = [$targetRouteNames];
        }

        $active = false;
        foreach ($targetRouteNames as $targetRouteName) {
            if ($active) {
                break;
            }
            if ($targetRouteName == $currentRouteName) {
                $active = true;
            }
        }

        return $active ? $class : "";
    }
}

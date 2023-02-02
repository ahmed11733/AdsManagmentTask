<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Http\Traits\AdTrait;
use App\Http\Traits\ResponsesTrait;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    use ResponsesTrait, AdTrait;

    private $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    public function filter(Request $request)
    {
        $ads = $this->getAllAds();
        if ($request->query('category_name') && $request->query('category_name') != 'none') {
            $categoryName = $request->query('category_name');
            $category_id = Category::where('name', $categoryName)->get()->implode('id');
            $ads = Ad::where('category_id', $category_id)
                ->get();
        }

        if ($request->query('tag_name') && $request->query('tag_name') != 'none') {
            $tagName = $request->query('tag_name');
            $ads = Ad::whereHas('tags', function ($query) use ($tagName) {
                $query->where('name', $tagName);
            })->get();
        }

        return  $this->success(AdResource::collection($ads), "Data Filterd Successfully");
    }
}

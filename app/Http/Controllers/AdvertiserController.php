<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertiserAdsResource;
use App\Http\Traits\AdvertiserTrait;
use App\Http\Traits\ResponsesTrait;
use App\Models\Advertiser;

class AdvertiserController extends Controller
{
    use AdvertiserTrait, ResponsesTrait;

    private $advertiser;

    public function __construct(Advertiser $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    public function advertiser_ads($id)
    {
        $advertiser = $this->getAdvertiserById($id);
        return  $this->success(new AdvertiserAdsResource($advertiser), "");
    }
}

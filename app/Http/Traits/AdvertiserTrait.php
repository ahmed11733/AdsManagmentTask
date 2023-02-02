<?php

namespace App\Http\Traits;

trait AdvertiserTrait
{

    private function getAdvertiserById($id)
    {
        return $this->advertiser::findOrFail($id);
    }

}

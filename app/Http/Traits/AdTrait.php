<?php

namespace App\Http\Traits;

trait AdTrait
{
    private function getAllAds()
    {
        return $this->ad::get();
    }
}

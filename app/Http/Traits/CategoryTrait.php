<?php

namespace App\Http\Traits;

trait CategoryTrait
{
    private function getAllCategories()
    {
        return $this->category::select('id', 'name')->get();
    }

    private function getCategoryById($id)
    {
        return $this->category::findOrFail($id);
    }
}

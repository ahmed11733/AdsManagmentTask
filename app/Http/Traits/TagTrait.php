<?php

namespace App\Http\Traits;

trait TagTrait
{
    private function getAllTags()
    {
        return $this->tag::select('id', 'name')->get();
    }

    private function getTagById($id)
    {
        return $this->tag::findOrFail($id);
    }
}

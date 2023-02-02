<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\Tag\TagRequest;
use App\Http\Resources\TagResource;
use App\Http\Traits\ResponsesTrait;
use App\Http\Traits\TagTrait;

class TagController extends Controller
{

    use TagTrait, ResponsesTrait;

    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }


    public function index()
    {
        $tags = $this->getAllTags();
        return $this->success(TagResource::collection($tags), "Data retrived successfully");
    }


    public function store(TagRequest $request)
    {
        $tag = $this->tag::create([
            'name'     => $request->name
        ]);
        return $this->success(new TagResource($tag), "Tag stored successfully");
    }


    public function update(TagRequest $request, $id)
    {
        $tag = $this->getTagById($id);
        $tag->update([
            'name'   => $request->name,
        ]);
        return $this->success(new TagResource($tag), "Tag updated successfully");
    }


    public function destroy($id)
    {
        $tag = $this->getTagById($id);
        $tag->delete();
        return $this->success(null, "Category deleted successfully");
    }
}

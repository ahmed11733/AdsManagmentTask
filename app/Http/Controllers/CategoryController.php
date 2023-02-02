<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ResponsesTrait;

class CategoryController extends Controller
{

    use CategoryTrait, ResponsesTrait;

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->getAllCategories();
        return $this->success(CategoryResource::collection($categories), "Data retrived successfully");
    }


    public function store(CategoryRequest $request)
    {
        $category = $this->category::create([
            'name' => $request->name,
        ]);
        return $this->success(new CategoryResource($category), "Category stored successfully");
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = $this->getCategoryById($id);
        $category->update([
            'name'   => $request->name,
        ]);
        return $this->success(new CategoryResource($category), "Category updated successfully");
    }


    public function destroy($id)
    {
        $category = $this->getCategoryById($id);
        $category->delete();
        return $this->success(null, "Category deleted successfully");
    }
}

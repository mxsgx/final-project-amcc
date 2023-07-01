<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showIndexPage()
    {
        $categories = Category::paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(CreateCategoryRequest $request)
    {
        $category = Category::create($request->safe()->toArray());

        if ($request->user()->can('update', $category)) {
            return to_route('admin.categories.edit', compact('category'));
        } elseif ($request->user()->can('viewAny', Category::class)) {
            return to_route('admin.categories.index');
        }

        return to_route('root');
    }

    public function showCreatePage()
    {
        return view('admin.categories.create');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->safe()->toArray());

        return to_route('admin.categories.edit', compact('category'));
    }

    public function showEditPage(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function delete(Request $request, Category $category)
    {
        $category->forceDelete();

        if ($request->user()->can('viewAny', Category::class)) {
            return to_route('admin.users.index');
        }

        return to_route('root');
    }
}

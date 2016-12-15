<?php

namespace Modules\Category\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('category::dashboard.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect('dashboard/category');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('category::dashboard.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->all());

        return redirect('dashboard/category');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('dashboard/category');
    }
}

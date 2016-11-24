<?php

namespace Modules\Cake\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cake\Entities\Cake;
use Modules\Category\Entities\Category;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::with('category')->paginate();

        return view('cake::dashboard.index', compact('cakes'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('cake::dashboard.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Cake::create($request->all());

        return redirect('dashboard/cake');
    }

    public function edit()
    {
        $categories = Category::pluck('name', 'id');

        return view('cake::dashboard.edit', compact('categories'));
    }

    public function update(Cake $cake, Request $request)
    {
        $cake->update($request->all());

        return redirect('dashboard/cake');
    }

    public function destroy(Cake $cake)
    {
        $cake->delete();

        return redirect('dashboard/cake');
    }
}

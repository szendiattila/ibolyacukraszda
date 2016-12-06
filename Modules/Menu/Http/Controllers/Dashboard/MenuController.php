<?php

namespace Modules\Menu\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('order')->get();

        return view('menu::dashboard.index', compact('menus'));
    }

    public function create()
    {
        return view('menu::dashboard.create');
    }

    public function store(MenuRequest $request)
    {
        Menu::create($request->all());

        return redirect('dashboard/menu');
    }

    public function edit(Menu $menu)
    {
        return view('menu::dashboard.edit', compact('menu'));
    }

    public function update(Menu $menu, MenuRequest $request)
    {
        $menu->update($request->all());

        return redirect('dashboard/menu');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('dashboard/menu');
    }

}

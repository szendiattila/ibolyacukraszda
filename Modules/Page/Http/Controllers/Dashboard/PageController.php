<?php

namespace Modules\Page\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate();

        return view('page::dashboard.index', compact('pages'));
    }

    public function create()
    {
        return view('page::dashboard.create');
    }

    public function store(Request $request)
    {
        Page::create($request->all());

        return redirect('dashboard/page');
    }

    public function edit(Page $page)
    {
        return view('page::dashboard.edit', compact('page'));
    }

    public function update(Page $page, Request $request)
    {
        $page->update($request->all());

        return redirect('dashboard/page');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect('dashboard/page');
    }
}

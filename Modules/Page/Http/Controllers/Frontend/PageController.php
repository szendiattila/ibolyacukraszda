<?php

namespace Modules\Page\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::whereUrl($slug)->first();

        return view('page::Frontend.index', compact('page'));
    }
}

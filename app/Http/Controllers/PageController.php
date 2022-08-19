<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Page;

class PageController extends Controller
{
    
    public function adminList(){
        return Inertia::render(('Admin/Pages/AdminList'),[
            'pages'=>Page::withTrashed()->get()
        ]);
    }

    public function show($page_slug){
        if(!$page = Page::where('slug', $page_slug)->first()){
            return abort(404);
        }
        return Inertia::render('Pages/Show', [
            'page'=>$page
        ]);
    }

    public function create(){
        return Inertia::render(('Admin/Pages/Create'),[
            'page'=>new Page()
        ]);
    }

    public function store(PageRequest $request){
        $page = new Page($request->validated());
        $page->save();
        return redirect()->route('admin.pages.update', ['page'=>$page])->with('succeed', 'Stránka bola vytvorená.');
    }

    public function edit(Page $page){
        return Inertia::render(('Admin/Pages/Edit'),[
            'page'=>$page
        ]);
    }

    public function update(PageRequest $request, Page $page){
        $page = $page->fill($request->validated());
        $page->save();
        return redirect()->route('admin.pages.update', ['page'=>$page])->with('succeed', 'Stránka bola upravená.');
    }


    public function restore($page_id){
        $page = Page::withTrashed()->where('id', $page_id)->first();
        $page->restore();
        return redirect()->route('admin.pages')->with('succeed', 'Stránka bola obnovená.');
    }

    public function delete(Page $page){
        $page->delete();
        return redirect()->route('admin.pages')->with('succeed', 'Stránka bola vymazaná.');
    }
    public function destroy($page_id){
        $page = Page::withTrashed()->where('id', $page_id)->first();
        $page->forceDelete();
        return redirect()->route('admin.pages')->with('succeed', 'Stránka bola permanentne vymazaná.');
    }
}

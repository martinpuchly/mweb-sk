<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use Inertia\Inertia;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PageController extends Controller
{
    
    public function adminList(){
        return Inertia::render(('Admin/Pages/AdminList'),[
            'pages'=>Page::withTrashed()->get()
        ]);
    }

    public function show(Request $request, $page_slug){
        if(!$page = Page::where('slug', $page_slug)->first()){
            return abort(404);
        }
        if(empty(cookie('page_view_'.$page->id))){
            $page->increment('views');
            cookie($name = 'page_view_'.$page->id, $value = true, 60*24*30);
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


    public function upload_images(Request $request)
    {

        $file = $request->file('image');
        $image = Image::make($file);
        if($image->width()>450 or $image->height()>450){
            $image->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        //SAVE
        $fileName = Str::random(7).'.'.$file->getClientOriginalExtension(); // MENO + KONCOVKA OBRAZKU
        $image->save(public_path('images/pages/'.$fileName));


            $url = asset('images/pages/'.$fileName); 
            return response()->json(['url'=>$url]);

    }
}

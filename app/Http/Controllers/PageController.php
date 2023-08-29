<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use App\Http\Requests\PageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        Gate::authorize('is-admin');

        return Inertia::render('Pages/Index', [
            'pages' => Page::withTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        Gate::authorize('is-admin');

        return Inertia::render('Pages/Create', [
            'show_options' => Page::SHOW_OPTIONS
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request): RedirectResponse
    {
        Gate::authorize('is-admin');

        $page = Page::create($request->only(['title', 'slug', 'body', 'accessLevel', 'description', 'user_id']));
        return redirect()->route('admin.page.edit', ['page'=>$page->id])->with('Stránka bola vytvorená.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $page_slug): InertiaResponse|RedirectResponse
    {
        if(!$page = Page::where('slug', $page_slug)->with('user')->first())
        {
            return abort(404);
        }

        if (!$request->session()->exists('page_views_'.$page->id)) 
        {
            $page->increment('views');
            $request->session()->put('page_views_'.$page->id, 1);
        }
        


        return Inertia::render('Pages/Show', [
            'page'=>$page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): InertiaResponse
    {
        Gate::authorize('is-admin');

        return Inertia::render('Pages/Edit', [
            'page'=>$page,
            'show_options' => Page::SHOW_OPTIONS
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        Gate::authorize('is-admin');

        $page->update($request->only(['title', 'slug', 'body', 'accessLevel', 'description', 'user_id']));
        return back()->with('succeed', 'Stránka bola upravená.');

    }

    public function delete(Page $page): RedirectResponse
    {
        Gate::authorize('is-admin');

        $page->delete();
        return back()->with('succeed', 'Stránka bola vymazaná.');
    }


    public function restore($page_id): RedirectResponse
    {
        Gate::authorize('is-admin');

        $page = Page::withTrashed()->findOrFail($page_id);
        $page->restore();
        return back()->with('succeed', 'Stránka bol obnovená.');
    }

    public function destroy($page_id): RedirectResponse
    {
        Gate::authorize('is-admin');

        $page = Page::withTrashed()->findOrFail($page_id);
        $page->forceDelete();
        return back()->with('succeed', 'Stránka bola trvale vymazaná.');
    }
}

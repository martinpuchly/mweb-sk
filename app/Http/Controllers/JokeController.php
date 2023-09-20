<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\JokeRequest;

class JokeController extends Controller
{
    
    public function adminIndex(): InertiaResponse
    {
        Gate::authorize('is-admin');
        return Inertia::render('Jokes/adminIndex', [
            'jokes'=> Joke::paginate(10)
        ]);
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('Jokes/Create');
    }
    public function store(JokeRequest $request): RedirectResponse
    {
        $joke = Joke::create($request->only(['text']));
        return back()->with('succeed', 'Vtip bol pridaný.');
    }


    public function edit(Joke $joke): InertiaResponse
    {
        return Inertia::render('Jokes/Edit', [
            'joke'=>$joke
        ]);
    }

    public function update(JokeRequest $request, Joke $joke): RedirectResponse
    {
        $joke->update($request->only(['text']));
        return back()->with('succeed', 'Vtip bol upravený.');

    }

    public function delete(Joke $joke): RedirectResponse
    {
        $joke->delete();
        return back()->with('succeed', 'Vtip bol vymazaný.');

    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuickNewRequest;
use App\Models\QuickNew;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuickNewController extends Controller
{
    
    public function adminList(){
        $quicknews = QuickNew::orderBy('created_at', 'DESC')->with('user')->paginate(1);
        return Inertia::render('Admin/QuickNews/AdminList', [
            'quicknews'=> $quicknews
        ]);
    }


    public function create(){
        return Inertia::render('Admin/QuickNews/Create', [
            'quicknew'=> new QuickNew()
        ]);
    }

    public function store(QuickNewRequest $request){
        $quick_new = QuickNew::create($request->validated());
        return redirect()->route('admin.quicknews.create')->with('succeed', 'Novinka bola pridaná.');
    }

    public function edit(QuickNew $quicknew){
        return Inertia::render('Admin/QuickNews/Edit', [
            'quicknew'=> $quicknew
        ]);
    }

    public function update(QuickNewRequest $request, QuickNew $quicknew){
        $quicknew->fill($request->validated());
        $quicknew->save();
        return redirect()->route('admin.quicknews.update', ['quicknew'=>$quicknew])->with('succeed', 'Novinka bola upravená.');
    }

    public function delete(QuickNew $quicknew){
        $quicknew->delete();
        return redirect()->route('admin.quicknews')->with('notice', 'Novinka bola vymazaná.');
    }

}

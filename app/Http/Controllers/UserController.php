<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminList(){
        return Inertia::render('Admin/User/AdminList', [
            'users'=>User::paginate(20)
        ]);
    }


    public function edit(User $user){
    
        return Inertia::render('Admin/User/Edit', [
            'user'=>$user
        ]);
    }

    public function update(Request $request, User $user){
        $user->is_admin = $request->is_admin == 'true' ? 1 : 0;
        //dd($user);
        $user->save();
        return redirect()->route('admin.user.edit', $user)->with('succeed', 'Zmeny užívateľa boli uložené.');
    }
        
    public function delete(User $user){
        if($user->id == 1 || ($user->is_admin && Auth::id()!=1)){
            return back()->with('error', 'Užívateľa sa nepodarilo vymazať. Nie je možné vymazať hlavného administrátora a iba hlavný administrátor môže vymazať iného administrátora.');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('succeed', 'Užívateľa bol vymazaný.');

    }


}

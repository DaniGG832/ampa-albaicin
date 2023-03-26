<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {



        return view('admin/index');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexAdmin(Request $request)
    {

        $users = User::where('activado', '=', 1)->whereNot('id', Auth()->id())->orderByDesc('admin')->get();
        //return $users;

        return view('admin/admin', compact('users'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexUser(Request $request)
    {



        if ($request->input('act')) {
            # code...
            $users = User::where('activado', '=', 0)->where('admin', '=', 0)->get();
            //return $users;
        } else {

            $users = User::where('admin', '=', 0)->get();
        }

        return view('admin/user', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, User $user)
    {
        if ($user->admin) {
            return redirect()
                ->back()
                ->withInput()->with('success', "Usuario ' $user->name ' es admin y no se puede modificar");
        }

        $user->activado = !$user->activado;

        $user->save();

        return redirect()
            ->back()
            ->withInput()->with('success', "Usuario ' $user->name ' modificado correctamente");
    }

    public function updateAdmin(Request $request, User $user)
    {
        if(auth()->user() == $user){

            return redirect()
                ->back()
                ->withInput()->with('success', "No se puede modificar su usuario");
        }

        $adminCount = User::where('admin', 1)->count();

        
       if ($user->admin == 1 && $adminCount <= 1) {
            
            return redirect()
                ->back()
                ->withInput()->with('success', "Debe haber al menos un usuario administrator");
        } 
        
        $user->admin = !$user->admin;

        $user->save();

        return redirect()
            ->back()
            ->withInput()->with('success', "Usuario ' $user->name ' modificado correctamente");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

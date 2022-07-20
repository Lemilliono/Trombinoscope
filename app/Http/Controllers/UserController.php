<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::create([
            'login' => $request->login,
            'name' => $request ->name,
            'email' => $request->email, 
            'logas' => $request->logas,
            'groups' => $request->groups, 
            'login_date' => $request->login_date,
            'firstconnexion' => $request->firstconnexion,
            'password' => bcrypt($request->password)
        ]);

        if ($this -> fails()) {
            return response()->json(['message' => 'error' ],400);
        } else {
            return response($user, 201);
        ;
        }
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
    
        // On crée un nouvel utilisateur
        $user = User::create([
            'login' => $request->login,
            'name' => $request->name,
            'email' => $request->email, 
            'logas' => $request->logas,
            'groups' => $request->groups, 
            'login_date' => $request->login_date,
            'firstconnexion' => $request->firstconnexion,
            'password' => bcrypt($request->password)
        ]);
    
        // On retourne les informations du nouvel utilisateur en JSON
        if ($this -> fails()) {
            return response()->json(['message' => 'error'],400);
        }
        else {
            return response($user, 201);
        }  ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        $user = Http::post('https://auth.etna-alternance.net/login', [
        'login' => $request->login,
        'password' => $request->password,
        ]);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'login' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
    
        // On modifie les informations de l'utilisateur
        $user->update([
            'login' => $request->login,
            'name' => $request->name,
            'email' => $request->email, 
            'logas' => $request->logas,
            'groups' => $request->groups, 
            'login_date' => $request->login_date,
            'firstconnexion' => $request->firstconnexion,
            'password' => bcrypt($request->password)
        ]);
    
        // On retourne la réponse JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        // On retourne la réponse JSON
        return response()->json();
    }

     public function sortEmployees(Request $request) 
    {
        $employees = User::where('category_id', $request->login);
        
        return view('', compact('employees'));
    }

    public function showServices(Request $request)
    {
        
    }

}

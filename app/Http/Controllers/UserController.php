<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        //metoda de listarea a userilor 
        // all pentru a luat toti useri

        //conditi pentru a lua un obiect gold 
        //$users = User::where('id', '3')->get();
        $users = User::get();



        // dd(count($users));

        //$users = User::first();
        //afisarea primului user


        //transformarea codului Laravel in cod mysql, pentru a vedea de mysql rulam
        // $users = User::toSql();

        // dd($users);
        //definire variabila(clasa) pentru a lua toti useri
        //dd('stop nu trimite date din view (fisierul blade');
        return view('users.index', compact('users'));
    }

    public function create()
    {
        //incarcarea formularului pentru salvarea utilizatori
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());



        // User::create([
        //     'name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'Manus', // Make sure this is provided
        //     'password' => 'Maaa',
        //     // other fields...
        // ]);


        return redirect()->route('users.index');

        /*
        
  $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);
        */
    }

    public function show(User $user)
    {

        //fis punem in parametru sub forma acesta 
        // $user = User::first();

        // fie punedirect in metoda
        // dependecy insejection , intre () $user User este la fel cu $user = User
        //ii spune aceste metoda ce html sa incarca, si ii trimite date acestui html

        //$user ceva definit pentru a se refolosi in compact()
        return view('users.show', compact('user'));
        // return view , trimite catre folderul users , in fisierul show.blade.php , datele dinamice din 
        //$user 
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

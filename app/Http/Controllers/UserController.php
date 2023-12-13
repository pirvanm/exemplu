<?php

namespace App\Http\Controllers;

use App\Models\User;
// includerea clasei Request
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

    // public nivelul de vizibilitate a metodei
    public function store(Request $request)
    {
        // Request $request
        // Request , este o clasa de este definite in sistemul laravel 
        // $request = obiectul ce "incapsuleaza"/ memoreaza clasa request

        // De ce nu avem = ? fiindca asignam
        // dependcy insejection , faptul ca punem prima data 
        // Clasa si dupa cu spatiu fara vrun operator precum = pentru atirbuirea
        // intre () intr-o metoda(functie mai completa)
        User::create($request->all());

        //Illuminate\Http\Request; clasa request se regaseste aici  si este folosita de aici 

        // Clasa User, metoda create pentru a salva direct in modelul  ce este legat(bingind) de tabelul user
        //$request este un obiect , ca permite accesarea metodelor din clasa Request

        // all() metoda din clasa request


        // User::create([
        //     'name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'Manus', // Make sure this is provided
        //     'password' => 'Maaa',
        //     // other fields...
        // ]);


        // dupa ce am salvat userul , vom face redirect catre ruta users.index
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
        // dependncy injection pentru Clasa obiectul, User $user 

        //$user = User::all();
        // ca valori pentru acesta metoda(User $user)
        //rezultatul este acelasi
        // trimitem obiectul user 
        // $user ,face automat pentru atribuirea userlui curent

        // datorita rutei generate : users/{user} , va trimite in fisierul nostru
        // edit.blade.php din folderul users 

        //return view (folder.fisierulfinal.blade.php)
        //return view (folder.folder2.folder3.fisierblade.php)
        //    . pentru a pentru accesa fisierul din folderul dat in partea stanga

        return view('users.edit', compact('user'));
        // daca nu avem fisierul in nici un folder din folderul views, nu avem nevoie de punct
        // return view('welcome', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //dd('aici2');
        // validate de tip backend direct in controller pe metoda
        //       $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        // prealuarea toate campurile folosind $request->all()
        //pentru a vedea ce campuri putem lua din request , folosim all()
        // prealuarea unui singur camp :$request->name
        // dd($request->name);


        // pentru a nu mai lua camp cu camp 
        // metoda update, metoda ce ne permite actualizarea modelului curent 
        //modelul curent (filtrat de catre User $user), va stii id ul curent
        $user->update($request->all());
        //return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('users.index');
    }
}

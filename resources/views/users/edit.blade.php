@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit User</h1>
    <!-- @dd($user->id) -->
    <!--  -->
    <form action="{{ route('users.update', $user) }}" method="POST" class="mt-3">
        <!-- mt-3 clasa de boostrap 
    vezi: https://getbootstrap.com/docs/4.0/utilities/spacing/
-->
        @csrf
        <!-- metoda pentru sistemul blade pentru a verifica erororile de securitate din blade
            csrf protocol de securitate
            https://laravel.com/docs/10.x/csrf#main-content 
        -->

        @method('PUT')
        <!-- @method pentru sistemul blade -->

        <!-- orice contine @ este definite de catre template engineul blade -->
        <!-- P.s vezi https://laravel.com/docs/10.x/blade#main-content -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            <!-- value , atribute html ce ne permite "popularea campului nostru cu o valoare predefinita -->
        </div>

        <!-- validarea pe blade

  class="@error('title') is-invalid @enderror">
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

         -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">


            <!-- users/{user} , din url ul proiectul.com/users/id/edit
            proiectul.com/users/1/edit va lua email useurlui care id 1 -->
            <!-- {{ $user->email, va lua emailul userului cu id-ul respect}} -->
            <!-- popularea inputului email cu valoare din obiectul data -->
        </div>

        <!-- obbligatoriu avem si actiunea ce se va declansa ,daca toate campurile , sau validarea este corecta -->
        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
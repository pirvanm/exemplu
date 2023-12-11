@extends('layouts.app')
@if($users )
<!-- incarcam css ul, clase din fisierul layouts.app -->
@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Users</h1>
    <!-- <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a> -->

    <div class="list-group">
        <!-- foreach, iterarea datelor ce au venit din controller , mai exact din metoda index a fisierului
    usercontroller.php  -->

        @foreach ($users as $user)
        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            {{ $user->name }}
            <div>
                <!-- <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm">Edit</a> -->
                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
Daca nu avem useri
@endif
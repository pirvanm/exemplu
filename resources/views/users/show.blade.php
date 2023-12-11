@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <!-- continului intregului obiect curent(obiect curent userul cu id 2) -->
            {{$user}};

            <!-- {{ }} pentru afisa continul unei variabile -->
            <h5 class="card-title">{{ $user->name }}</h5>
            <!-- accesam propietate name din obiectul user -->
            <!-- obiectul user ce contine diferite informati -->
            <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
            <!-- accesam propietate name din obiectul email -->
            <!-- Other user details here -->
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back to list</a>
</div>
@endsection
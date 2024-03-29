@extends('layouts.app')

@section('content')

<form method="post">
    @csrf

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Connexion</button>
</form>

@endsection
@extends('layouts.app')

@section('content')

<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<form method="post">
    @csrf

    <label for="name">nom de la salle:</label>
    <input type="text" id="name" name="name">

    <label for="price">prix:</label>
    <input type="text" id="price" name="price">

    <button>Ajouter</button>
</form>

@endsection

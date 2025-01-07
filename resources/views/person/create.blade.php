<!-- resources/views/person/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle personne</h1>
    <form action="{{ route('person.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="birth_date">Date de naissance</label>
            <input type="date" id="birth_date" name="birth_date" required>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection

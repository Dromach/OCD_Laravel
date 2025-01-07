<!-- resources/views/person/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Liste des personnes</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($persons as $person)
            <li>{{ $person->name }} - Créée par: {{ $person->user->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('person.create') }}">Créer une nouvelle personne</a>
@endsection

<!-- resources/views/person/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Détails de la personne : {{ $person->name }}</h1>
    <p>Email: {{ $person->email }}</p>
    <p>Date de naissance: {{ $person->birth_date }}</p>

    <h3>Enfants</h3>
    <ul>
        @foreach($person->children as $child)
            <li>{{ $child->name }}</li>
        @endforeach
    </ul>

    <h3>Parents</h3>
    <ul>
        @foreach($person->parents as $parent)
            <li>{{ $parent->name }}</li>
        @endforeach
    </ul>
@endsection

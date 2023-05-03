@extends('layouts.app')


@section('content')

<div class="container">
    @csrf
    <div class="col">
        <div class="jumbotron">
        <h1 class="display-4">Medicines</h1>
        <a class="btn btn-primary btn-lg" href="{{ route('medicine.create') }}" role="button">create medicines</a>
        </div>
    </div>

</div>

@endsection

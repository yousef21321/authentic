@extends('layouts.app')

@section('content')
@php
$genders=['Male','Female'];
@endphp

<div class="container mt-4">
<form method="POST" action="{{ route ('profile.update') }}">
    @csrf
    @method('PUT')
{{-- E-mail --}}
<div class="from-group">
    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" value="{{ $user->profile->email }}" placeholder="name@example.com">
    {{-- value="{{ $user->profile->Email }}" --}}
</div>
{{-- Name --}}
<div class="from-group">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name"  value="{{ $user->profile->name }}">
    {{-- value="{{ $user->profile->Name }}" --}}
</div>
{{-- Health status --}}
<div class="from-group">
    <label for="exampleFormControl health_condition" class="form-label">health_condition</label>
    <textarea class="form-control" name="health_condition" rows="3">
        {{ $user->profile->health_condition }}
    </textarea>
</div>
{{-- Address --}}
<div class="from-group">
    <label for="exampleFormControlInput1" class="form-label">Address</label>
    <input type="text" class="form-control"  name="address" value="{{ $user->profile->address }}">
    {{-- value="{{ $user->profile->Address }}" --}}
</div>
{{-- Phone_Number --}}
<div class="from-group">
    <label for="exampleFormControlInput1" class="form-label">phone_number</label>
    <input type="number" class="form-control"  name="phone_number" value="{{ $user->profile->phone_number }}">
    {{-- value="{{ $user->profile->Phone_Number }}" --}}
</div>
{{-- Age --}}
<div class="from-group">
    <label for="exampleFormControlInput1" class="form-label">age</label>
    <input type="number" class="form-control" name="age" value="{{ $user->profile->age }}">
    {{-- value="{{ $user->profile->age }}" --}}
</div>
{{-- Gender --}}
<div class="from-group">
    <label><b>Select gender</b></label>
    <select class="form-select" name="gender">
        <option selected>Open this select menu</option>
        @foreach ($genders as $gender){
            <option value='{{ $gender }}' {{ $user->profile->gender == $gender ? 'selected':'' }}> {{ $gender }} </option>
        }
        @endforeach
    </select>
</div>

{{-- Submit --}}
<button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>

@endsection

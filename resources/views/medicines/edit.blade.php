@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form method="POST" action="{{ route('medicine.update') }}">
            @csrf
            @method('PUT')
            {{-- E-mail --}}
            <div class="from-group">
                <label for="exampleFormControlInput1" class="form-label">medicine_name</label>
                <input type="email" class="form-control" name="email" value="{{ $medicine->medicine_name }}"
                    placeholder="name@example.com">
                {{-- value="{{ $user->profile->Email }}" --}}
            </div>
            {{-- Name --}}
            <div class="from-group">
                <label for="exampleFormControlInput1" class="form-label">price</label>
                <input type="text" class="form-control" name="name" value="{{ $medicine->price }}">
                {{-- value="{{ $user->profile->Name }}" --}}
            </div>
            {{-- Health status --}}
            <div class="from-group">
                <label for="exampleFormControl health_condition" class="form-label">description</label>
                <textarea class="form-control" name="health_condition" rows="3">
        {{ $medicine->description }}
    </textarea>
            </div>
            {{-- Address --}}
            <div class="from-group">
                <label for="exampleFormControlInput1" class="form-label">phone_number</label>
                <input type="text" class="form-control" name="address" value="{{ $medicine->phone_number }}">
                {{-- value="{{ $user->profile->Address }}" --}}
            </div>


            {{-- Submit --}}
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

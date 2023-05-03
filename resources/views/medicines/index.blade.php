@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <a class="btn btn-primary btn-lg {{ Auth::user()->is_admin ? 'display' : 'disabled' }}"
            href="http://localhost/Projects/authentic/public/medicine/create">Create_newMedicines</a>
    </div>

    <div class="container mt-5">
        @csrf

        @if ($medicines->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">medicine_name</th>
                        <th scope="col">price</th>
                        <th scope="col">description</th>
                        <th scope="col">photo</th>
                        @if (Auth::user()->is_admin)
                            <th scope="col">Controller</th>
                        @else
                            {{-- do nothing --}}
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($medicines as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->medicine_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ URL::asset($item->photo) }}" alt="{{ $item->photo }}" class="img-tumbnall"
                                    width="100" height="100">
                            </td>
                            <td>

                                @if (Auth::user()->is_admin)
                                    <a {{ Auth::user()->is_admin ? 'display' : 'disabled' }}
                                        href="{{ route('medicine.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <a
                                            href="{{ route('order.create') }}" class="btn btn-primary">order</a>
                                    <form action="{{ route('medicine.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger" type="submit">
                                            <li class="fas fa-2x fa-trash-alt">Delete</li>
                                        </a>
                                    </form>
                                @else
                                    {{-- Do nothing --}}
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    No medicines!
                </div>
            </div>
        @endif

    </div>
@endsection

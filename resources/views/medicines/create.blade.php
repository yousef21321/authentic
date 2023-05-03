@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <div class="jumbotron">
        <h1 class="display-4">Create medicine</h1>
        </div>
    </div>
</div>

<div class="container m-5">

    <div class="container mt-4">
        <form action="{{ route ('medicine.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">medicine_name</label>
            <input type="text" class="form-control"  name="medicine_name" >
        </div>

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">price</label>
            <input type="text" class="form-control"  name="price" >
        </div>

        <div class="from-group">
            <label for="exampleFormControl Healthstatus" class="form-label">description</label>
            <input type="text" class="form-control" name="description" >
            </textarea>
        </div>

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">photo</label>
            <input type="file" class="form-control"  name="photo" >

        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        </div>
</div>



@endsection


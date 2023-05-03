@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="text-nowrap bg-body-secondary border" style="width: 45rem;">
        <p>Please do not hesitate to contact us if you have any questions or feedback,</p>
        <p>as our team is always ready to answer your inquiries and meet your health needs.</p>
    </div>
</div>

<div class="container m-5">
    <div class="container mt-4">
        <form action="{{ route ('order.store') }}" method="POST">
            @csrf
            @method('POST')

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">medicine_name</label>
            <input type="text" class="form-control"  name="nameOfMedicine" >
        </div>

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">quantity</label>
            <input type="text" class="form-control"  name="Quantity" >
        </div>

        <div class="from-group">
            <label for="exampleFormControl Healthstatus" class="form-label">customer_name</label>
            <input type="text" class="form-control" name="Name" >
            </textarea>
        </div>

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">phone_number</label>
            <input type="number" class="form-control"  name="PhoneNumber" >

        </div>

        <div class="from-group">
            <label for="exampleFormControlInput1" class="form-label">address</label>
            <input type="text" class="form-control" name="Address" >

        </div>


        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        </div>
</div>

@endsection


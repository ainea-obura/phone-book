@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="text-center mt-5">Add New Contact</h1>
            <form class="card" method="POST" action="{{ route('contacts.store') }}">
                @csrf
                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="full names eg. Bill Gates">
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="text" name="phone" class="form-control" placeholder="phone number">
                        </div>
                    </div>
                   
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
        
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

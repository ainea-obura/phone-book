@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit contact</h2>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    {{--@method('PUT')--}}
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>First Name:</strong>
                                <input type="text" name="name" value="{{ $contact->first_name }}" class="form-control"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Last Name:</strong>
                                <input type="text" name="name" value="{{ $contact->last_name }}" class="form-control"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control"
                                    placeholder="Phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

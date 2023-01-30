@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h1 class="text-center mt-5">Phone Book App</h1>
            </div>

            <div class="text-right">
                <a class="btn btn-success float-right" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="container mt-3">
        <h2>Contacts</h2>           
        <table class="table">
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('contacts.show', $contact->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                        
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>

    {!! $contacts->links() !!}
</div>
@endsection

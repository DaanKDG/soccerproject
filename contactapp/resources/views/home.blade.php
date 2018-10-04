@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class=""> Contacts </h2>
    <a href="{{route('contacts.create')}}"><button class="btn btn-outline-dark">Add</button> </a>

    <ul class="list-group">
        @foreach($user->contacts as $contact)
            <li class="list-group-item list-group-item-info mt-3">
                Name: {{$contact->name}}
                
                {!! Form::open(['action' => ['ContactsController@destroy', $contact->id],'method' => 'POST', 'class'=> 'float-right']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::button('Delete', ['type' =>'submit', 'class' => 'btn btn-outline-dark float-right ml-2'])}}
                {!! Form::close() !!}
                <a href="{{route('contacts.edit', [ "id" => $contact->id])}}"><button class="btn btn-outline-dark float-right">Edit</button> </a>
            </li>
            <li class="list-group-item list-group-item-info">
                Email: {{$contact->email}}
             </li>

        @endforeach
    </ul>
</div>
@endsection

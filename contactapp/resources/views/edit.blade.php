@extends ('layouts.app')

@section ('content')
<div class="container">
    <h1>Bewerk het contact</h1>
    {!! Form::open(['action' => ['ContactsController@update', $contact->id], 'method' => 'POST']) !!}
    <div class="form-group">	
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $contact->name,['class' => 'form-control', 'placeholder' => 'Name', 'maxlength' => '40'])}}
    </div>

    <div class="form-group">	
        {{Form::label('E-mail', 'E-mail')}}
        {{Form::email('email', $contact->email,['class' => 'form-control', 'placeholder' => 'example@example.com', 'rows' => '2 ', 'maxlength' => '30'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-outline-dark mb-5 mt-1'])}}
    {!! Form::close() !!}   
</div>    
@endsection
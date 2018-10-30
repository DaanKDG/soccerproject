@extends ('layouts.app')

@section ('content')
<div class="jumbotron">
<h1 style="color: white; font-weight: bold; letter-spacing: 1px;" class=""> MAKE A  <span style="color: #3ffeca; "> PREDICTION</span> </h1> <small style="color: white;">Make free predictions, and have a chance of winning prizes!</small>
</div>
  <div class="container mt-5">

{!! Form::open(['method'=>'POST', 'action'=>'PredictionController@store']) !!}
        <div class="card">
  <div class="card-header border">
  PREMIER LEAGUE: UPCOMING FIXTURES  <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
  </div>

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATE</th>
      <th scope="col">KICK OFF</th>
      <th scope="col">HOME</th>
      <th scope="col">AWAY</th>
      <th scope="col">SCORE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($matches as $match)

  <tr>
      <th scope="row">1</th>
      <td>{{$match->date}}</td>
      <td>{{$match->time}}</td>
      {{Form::hidden('match[' . $match->match_id . '][homeTeamName]', $match->homeTeam )}}
      {{Form::hidden('match[' . $match->match_id . '][status]', $match->status )}}
      <td>{{$match->homeTeam}}</td>
      <td>{{$match->awayTeam}}</td>
      {{Form::hidden('match[' . $match->match_id . '][awayTeamName]', $match->awayTeam )}}
      <td style="width: 150px !important;"><div>{{Form::number('match[' . $match->match_id . '][homeTeam]' , '', [ 'class' =>'form-control-sm col col-sm-3'])}} <span class="ml-2" style="color: white;">-</span> {{Form::number('match[' . $match->match_id . '][awayTeam]' , '', [ 'class' =>'form-control-sm col col-sm-3 ml-2'])}} </div></td>
      
    </tr>

<!-- add card body -->
  @endforeach

    
  </tbody>
</table>

   </div>
   {{Form::button('Submit', ['type' =>'submit', 'class' => 'submit-btn float-right'])}} 
   {!! Form::close() !!}
  </div>
        


@endsection 

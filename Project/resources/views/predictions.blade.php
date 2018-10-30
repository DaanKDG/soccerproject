@extends ('layouts.app')

@section ('content')
<div class="jumbotron">
<h1 style="color: white; font-weight: bold; letter-spacing: 1px;" class="">PREDICTION <span style="color: #3ffeca; "> SCORES</span> </h1> <small style="color: white;">All your predictions for this week upcoming fixtures are listed below</small>
</div>

<div class="container">

<div class="card mt-5">
  <div class="card-header border">
 PREMIER LEAGUE: PREDICTIONS  <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
  </div>

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATE</th>
      <th scope="col">KICK OFF</th>
      <th scope="col">HOME</th>
      <th scope="col">AWAY</th>
      <th scope="col" style="color: #3ffeca;">SCORE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user->predictions as $prediction)

  <tr>
      <th scope="row">1</th>
      <td>{{$prediction->match->date}}</td>
      <td>{{$prediction->match->time}}</td>
      <td>{{$prediction->match->homeTeam}}</td>
      <td>{{$prediction->match->awayTeam}}</td>
      <td style="width: 150px !important;"><div>{{$prediction->homeScore}} - {{$prediction->awayScore}} </div></td>
      
    </tr>

  @endforeach

    
  </tbody>
</table>

   </div>
</div>
@endsection
@extends ('layouts.app')

@section ('content')
<div class="container">
<div class="card">
  <div class="card-header border">
  ENGLAND: PREMIER LEAGUE UPCOMING FIXTURES  <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
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
  @foreach($user->predictions as $prediction)

  <tr>
      <th scope="row">1</th>
      <td>{{$prediction->date}}</td>
      <td>{{$prediction->time}}</td>
      <td>{{$prediction->homeScore}}</td>
      <td>{{$prediction->awayScore}}</td>
      <td style="width: 150px !important;"><div> </div></td>
      
    </tr>

  @endforeach

    
  </tbody>
</table>

   </div>
</div>
@endsection
@extends ('layouts.app')

@section ('content')

<div class="jumbotron">
<h1 style="color: white; font-weight: bold; letter-spacing: 1px;" class="">LIVE FOOTBALL <span style="color: #3ffeca; "> SCORES</span> </h1> <small style="color: white;">Live scores are delayed by halftime and fulltime score</small>
</div>
<div class="container">


<div class="card mt-4 ">
  <div class="card-header border-green">
  PREMIER LEAGUE:<span style="color: #3ffeca;"> IN PLAY </span>  <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
  </div>

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATE</th>
      <th scope="col">KICK OFF</th>
      <th scope="col">HOME</th>
      <th scope="col">AWAY</th>
      <th scope="col" style='color: #3ffeca;'>HALF</th>
      <th scope="col" style='color: #3ffeca;'>FULL</th>
    </tr>
  </thead>
  <tbody>
  @foreach($active as $match)
  <tr>
      <th scope="row">1</th>
      <td>{{$match->date}}</td>
      <td>{{$match->time}}</td>
      <td>{{$match->homeTeam}}</td>
      <td>{{$match->awayTeam}}</td>
        <td style='font-weight: bold;'> 2-1</td>
      <td style=" font-weight: bold;"><div> 3-1 </div></td>
      
    </tr>

<!-- add card body -->
  @endforeach

    
  </tbody>
</table>

   </div>






 <div class="card">
  <div class="card-header border">
  PREMIER LEAGUE: <span style="color:#f92552;">FINISHED  </span>    <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
  </div>

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATE</th>
      <th scope="col">KICK OFF</th>
      <th scope="col">HOME</th>
      <th scope="col">AWAY</th>
      <th scope="col" style='color: #3ffeca;'>SCORE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($finished as $match)
  <tr>
      <th scope="row">1</th>
      <td>{{$match->date}}</td>
      <td>{{$match->time}}</td>
      <td>{{$match->homeTeam}}</td>
      <td>{{$match->awayTeam}}</td>
  
      <td style="font-weight:bold;" ><div> {{$match->homeScore}} - {{$match->awayScore}} </div></td>
      
    </tr>

<!-- add card body -->
  @endforeach

    
  </tbody>
</table>

   </div>


<div class="card">
  <div class="card-header border-yellow">
  
  PREMIER LEAGUE: <span style="color: yellow;">SCHEDULED  </span>  <small class="float-right" style="font-weight:bold;"> Matchday 12</small>
  </div>

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DATE</th>
      <th scope="col">KICK OFF</th>
      <th scope="col">HOME</th>
      <th scope="col">AWAY</th>
    </tr>
  </thead>
  <tbody>
  @foreach($scheduled as $match)
  <tr>
      <th scope="row">1</th>
      <td>{{$match->date}}</td>
      <td>{{$match->time}}</td>
      <td>{{$match->homeTeam}}</td>
      <td>{{$match->awayTeam}}</td>
  
    </tr>

<!-- add card body -->
  @endforeach

    
  </tbody>
</table>

   </div>




   </div>
@endsection
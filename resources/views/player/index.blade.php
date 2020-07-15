@extends('welcome')

@section('content')
    <div class="container">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="mb-0">Manage Players</h6>
                            @if ($message = Session::get('success'))
                                <div class="alert-success">
                                </div>
                            @endif
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('player.create', $team_id)}}" class="btn btn-sm btn-primary">Add Player</a>
                        </div>
                    </div>

                    <div class="row container">
                        @foreach($players as $player)
                            <div class="card mb-3 col-md-6" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img srcset="{{isset($player->image) ? Storage::url($player->image) : 'http://via.placeholder.com/565x565.jpg'  }}" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$player->full_name}}</h5>
                                            <p class="card-text">Player jersey number : {{$player->jersey_number}}</p>
                                            <p class="card-text"><a href="{{route('player.show', $player->id)}}" class="btn btn-sm btn-primary">Details</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Light table -->

            </div>
        </div>
    </div>
@endsection

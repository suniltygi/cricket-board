@extends('welcome')

@section('content')
    <div class="container">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="mb-0">Manage Team</h6>
                            @if ($message = Session::get('success'))
                                <div class="alert-success">
                                </div>
                            @endif
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('team.create')}}" class="btn btn-sm btn-primary">Add Team</a>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table id="myTable" class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th class="sort text-center" data-sort="budget">#</th>
                            <th class="sort text-center" data-sort="budget">Logo</th>
                            <th class="sort text-center" data-sort="status">Name</th>
                            <th class="sort text-center" data-sort="status">Points</th>
                            <th class="sort text-center" data-sort="status">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <th class="sort text-center">{{$team->id}}</th>
                            <td class="sort text-center"><img srcset="{{isset($team->logo) ? Storage::url($team->logo) : 'http://via.placeholder.com/565x565.jpg'  }}" style="max-width: 202px; max-height: 50px;" alt=""></td>
                            <td class="sort text-center">{{$team->name}}</td>
                            <td class="sort text-center">{{$team->points}}</td>
                            <td class="sort text-center">
                                <a href="{{route('team.show', $team->id)}}" type="button" class="btn  btn-sm btn-primary" title="">View Team</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
            </div>
        </div>
    </div>
@endsection

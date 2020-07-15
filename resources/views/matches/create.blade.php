@extends('welcome')

@section('content')

    <div class="container">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h6 class="mb-0">Fix Match </h6>
                            @if ($message = Session::get('errors'))
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($message = Session::get('warning'))
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Card header -->
                <div class="card-body">

                    <form method="POST" action="{{ route('matches.store') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="p-sm form-horizontal">
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Team One <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control smartsearch_keyword @error('team_one') is-invalid @enderror" id="team_one" name="team_one" value="{{ old('team_one') }}" required>
                                            <option value="">Select Team One</option>
                                            @foreach($teams as $team)
                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('team_one')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Team Two <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control smartsearch_keyword @error('team_two') is-invalid @enderror" id="team_two" name="team_two" value="{{ old('team_two') }}" required>
                                            <option value="">Select Team Two</option>
                                            @foreach($teams as $team)
                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                            @endforeach
                                            @error('team_one')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Match Date <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('match_date') is-invalid @enderror" value="{{ old('match_date') }}" type="date" id="date" name="match_date">
                                        @error('match_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!--Footer-->
                        <div class="modal-footer clear_both">
                            <button type="submit" class="btn btn-primary btn-sm" id="submitButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

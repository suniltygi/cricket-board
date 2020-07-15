@extends('welcome')

@section('content')
    <div class="container">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h6 class="mb-0">Add Player </h6>
                        </div>
                    </div>
                </div>
                <!-- Card header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('player.store') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="p-sm form-horizontal">
                            <div class="row">
                                <input type="hidden" name="team" value="{{$team->id}}">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">First Name <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text" id="first_name" name="first_name">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Last name <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text" id="last_name" name="last_name">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Image <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" id="image" name="image">
                                        <span> Max Size: 1 MB</span>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Player jersey number <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('jersey_number') is-invalid @enderror" value="{{ old('jersey_number') }}" type="number" id="jersey_number" name="jersey_number">
                                        @error('jersey_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Country<span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" type="text" id="country" name="country">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Player History</h6>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Total Matches <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('matches') is-invalid @enderror" value="{{ old('matches') }}" type="number" id="matches" name="matches">
                                        @error('matches')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Total Runs <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('runs') is-invalid @enderror" value="{{ old('runs') }}" type="number" id="runs" name="runs">
                                        @error('runs')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Highest scores<span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('highest_score') is-invalid @enderror" value="{{ old('highest_score') }}" type="number" id="highest_score" name="highest_score">
                                        @error('highest_score')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Total Fifty <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('fifties') is-invalid @enderror" value="{{ old('fifties') }}" type="number" id="fifties" name="fifties">
                                        @error('fifties')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Total Hundreds <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('hundreds') is-invalid @enderror" value="{{ old('hundreds') }}" type="number" id="hundreds" name="hundreds">
                                        @error('hundreds')
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
                            <button type="reset" class="btn btn-white btn-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


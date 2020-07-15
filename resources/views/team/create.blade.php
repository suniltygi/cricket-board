@extends('welcome')

@section('content')
    <div class="container">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h6 class="mb-0">Add Team </h6>
                        </div>
                    </div>
                </div>
                <!-- Card header -->
                <div class="card-body">

                    <form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="p-sm form-horizontal">
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Name <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Club State <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-8">
                                        <input required class="form-control @error('club') is-invalid @enderror" value="{{ old('club') }}" type="text" id="club" name="club">
                                        @error('club')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                    <label class="col-md-4 control-label">Logo Image <span class="required" style="color:red">*</span></label>
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

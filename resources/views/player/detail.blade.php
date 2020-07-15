@extends('welcome')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h6 class="mb-0">Player Details</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <h6 class="heading-small text-muted mb-4">General Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Full Name</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->first_name}} {{$player->last_name}}</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Team Name</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->team->name}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">jersey number </label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->jersey_number}}</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Country</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->country}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Player Image </label>
                                    <img srcset="{{isset($player->image) ? Storage::url($player->image) : 'http://via.placeholder.com/565x565.jpg'  }}" style="max-width: 202px; max-height: 70px;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!--Other Details -->
                    <h6 class="heading-small text-muted mb-4">History</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Total Matches</label>
                                    <label class="form-control-label col-lg-6 text-muted" for="input-username">{{$player->matches}}</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Total Runs</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->runs}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Highest Score</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->highest_score}}</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Fifties</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->fifties}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label col-lg-3" for="input-username">Hundreds</label>
                                    <label class="form-control-label col-lg-3 text-muted" for="input-username">{{$player->hundreds}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                </form>
            </div>
        </div>
    </div>

@endsection

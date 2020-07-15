@extends('welcome')

@section('content')
    <div class="container">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="mb-0">Manage Matches</h6>
                            @if ($message = Session::get('success'))
                                <div class="alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('matches.create')}}" class="btn btn-sm btn-primary">Match Fixtures Manually</a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary autoFixture">Match Fixtures Auto</a>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th class="sort text-center" data-sort="budget">#</th>
                            <th class="sort text-center" data-sort="budget">Team 1</th>
                            <th class="sort text-center" data-sort="status">Team 2</th>
                            <th class="sort text-center" data-sort="status">Winner</th>
                            <th class="sort text-center" data-sort="status">Match Date</th>
                            <th class="sort text-center" data-sort="status">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($matches as $match)
                            <tr>
                                <td class="sort text-center">{{$match->id}}</td>
                                <td class="sort text-center">{{$match->teamOne->name}}</td>
                                <td class="sort text-center">{{$match->teamTwo->name}}</td>
                                <td class="sort text-center">{{$match->winnerTeam->name ?? '-'}}</td>
                                <td class="sort text-center">{{$match->match_date ?? '-'}}</td>
                                @if($match->status == 0)
                                <td class="sort text-center">
                                    <a href="#" type="button" data-toggle="modal" data-value="{{$match->id}}" data-target="#exampleModal" class="btn  btn-sm btn-primary getMatchDetails" title="">Update Match Status</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Match Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('matches.update')}}">
                        @csrf
                        <div class="form-group">
                            <label for="winnerTeam">Winner</label>
                            <select class="form-control" id="winnerTeam" class="teamsOptions" name="winnerId">
                            </select>
                        </div>
                        <input type="hidden" class="form-control" name="matchId" id="matchId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('JsSection')
    <script type="text/Javascript">
        /**
         * Ajax Request to fetch the details of match
         */
        $('.getMatchDetails').click(function () {
            var matchId = $(this).attr('data-value');
            if(matchId) {
                $.ajax({
                    method: "GET",
                    url: "get-match-details/" + matchId,
                }).done(function (response) {
                    var finalResponse = $.parseJSON(response)
                    html = '<option value="" >Select Team</option>';
                    html += `<option value="` + finalResponse.team_one.id + `">` + finalResponse.team_one.name + `</option>`;
                    html += `<option value="` + finalResponse.team_two.id + `">` + finalResponse.team_two.name + `</option>`;
                   $('#winnerTeam').html(html);
                });
            }
            $('#matchId').val(matchId);
        })

        /**
         * Ajax Request to auto fix the match on current date
         */
        $('.autoFixture').click(function () {
            $.ajax({
                method: "GET",
                url: "fix-match/",
            }).done(function (response) {
                var finalResponse = $.parseJSON(response)
                if(finalResponse.code == 200){
                    alert(`Match between teams is fixed`);
                    window.location.reload();
                }else{
                    alert(`No Team Available for match`);
                    window.location.reload();
                    
                }
            });
        })
    </script>
@endsection

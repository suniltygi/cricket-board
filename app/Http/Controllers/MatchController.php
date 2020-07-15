<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Http\Requests\MatchStatusUpdateRequest;
use App\Models\Match;
use App\Models\Team;
use App\Services\MatchService;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    /**
     * Display a listing of the matches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::all();
        return view('matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchRequest $request)
    {
        $match = $this->matchService->createManualMatch($request->all());
        if($match){
            return redirect()->route('matches.index')->with('success', 'Match Created successfully');
        }else{
            return back()->with('warning', 'One team already have match today');
        }

    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatchStatusUpdateRequest $request)
    {
        $match = $this->matchService->updateStatus($request->all());
        return redirect()->route('matches.index')->with('success', 'Match Status Updated Successfully');

    }

    /**
     * To get the match details
     * @return json response
     */
    public function getMatchDetails($id)
    {
       $match = Match::with('teamOne','teamTwo')->findOrFail($id);
        return json_encode($match);
    }

    /**
     * To create the automatic match fixture
     * @return data
     */
    public function fixMatch()
    {
       $match = $this->matchService->checkAutoMatch();
       return $match;
    }
}



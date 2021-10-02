<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Election;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Illuminate\Support\Str;

class VoteController extends Controller
{
    //
    public function vote($election_uuid, $candidate_uuid){
        $user_uuid = Auth::user()->uuid;
        $hasVoted = Vote::where('election_uuid', $election_uuid)->where('user_uuid', $user_uuid)->exists();
        $election = Election::where('uuid', $election_uuid)->first();
        $now = Carbon::now();

        if($hasVoted){
            return redirect('elections')->with(['message' => 'You have voted already', 'election_uuid' => $election_uuid]);
        }

        if($now->lessThan(Carbon::parse($election->start_time))){
            return redirect('elections')->with(['message' => 'Election has not started', 'election_uuid' => $election_uuid]);
        }else if($now->lessThan(Carbon::parse($election->end_time))){
            $vote['uuid'] = Str::uuid();
            $vote['election_uuid'] = $election_uuid;
            $vote['candidate_uuid'] = $candidate_uuid;
            $vote['user_uuid'] = $user_uuid;
            Vote::create($vote);

            return redirect('elections')->with(['message' => 'Vote Counted', 'election_uuid' => $election_uuid]);
        }else{
            return redirect('elections')->with(['message' => 'Election has ended', 'election_uuid' => $election_uuid]);
        }
        
    }
}

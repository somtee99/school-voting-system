<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Election;
use App\Models\Candidate;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Illuminate\Support\Str;

class ElectionController extends Controller
{
    //
    public function createElection(request $request){
        $election = $request->all();
        $election['uuid'] = Str::uuid();
        $election['start_time'] = Carbon::parse($request->start_time);
        $election['end_time'] = Carbon::parse($request->end_time);

        //Poor Coding Here...I know
        $candidate['election_uuid'] = $election['uuid'];
        $candidate['uuid'] = Str::uuid();
        $candidate['first_name'] = $request->candidate1;
        Candidate::create($candidate);
        $candidate['uuid'] = Str::uuid();
        $candidate['first_name'] = $request->candidate2;
        Candidate::create($candidate);
        if(!is_null($request->candidate3)){ 
            $candidate['uuid'] = Str::uuid();
            $candidate['first_name'] = $request->candidate3;
            Candidate::create($candidate);
        }
        if(!is_null($request->candidate4)){
            $candidate['uuid'] = Str::uuid();
            $candidate['first_name'] = $request->candidate4;
            Candidate::create($candidate);
        }

        Election::create($election);
        return redirect('admin/election/create');
    }

    public function showCreateElection(){
        return view('admin.election-create');
    }

    public function showElections(){
        $elections = Election::whereNotNull('uuid')->latest()->get();
        $user_type = Auth::user()->user_type;

        return view('elections')->with('elections', $elections)->with('user_type', $user_type);
    }
}

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

        //Poor Coding Here...I know
        $candidate['election_uuid'] = $election['uuid'];
        $candidate['uuid'] = Str::uuid();
        $candidate['first_name'] = $request->candidate1;
        Candidate::create($candidate);
        $candidate['uuid'] = Str::uuid();
        $candidate['first_name'] = $request->candidate2;
        Candidate::create($candidate);
        if($request->has('candidate3')){
            $candidate['uuid'] = Str::uuid();
            $candidate['first_name'] = $request->candidate3;
            Candidate::create($candidate);
        }
        if($request->has('candidate4')){
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
        return view('elections');
    }
}

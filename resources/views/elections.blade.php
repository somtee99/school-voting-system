<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
@php
    
    $elections = App\Models\Election::whereNotNull('uuid')->latest()->get();
    
@endphp
<body>

<center><h1>Elections</h1></center>


@foreach($elections as $election)
    @php 
        $candidates = App\Models\Candidate::where('election_uuid', $election->uuid)->get();
    @endphp
        <h3>Position: {{ $election->position }} </h3>
        <h4>Start Time: {{ $election->start_time }} </h4>
        <h4>End Time: {{ $election->end_time }} </h4>
<table>
    <tr>
        <th>Name</th>
        <th>No of Votes</th>
        <th>Vote</th>
    </tr>

    @foreach ($candidates as $candidate)
        @php 
            $votes = App\Models\Vote::where('candidate_uuid', $candidate->uuid)->count();
        @endphp
        <tr>
            <td>{{ $candidate->first_name }}</td>
            <td>{{ $votes }}</td>
            <td>
                <a href="{{ url('vote/'.$election->uuid.'/'.$candidate->uuid) }}">
                    <button>Vote Him/Her</button> 
                </a>
            </td>
        </tr>
    @endforeach
  
  
</table>
@endforeach

</body>
</html>

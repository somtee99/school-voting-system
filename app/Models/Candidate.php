<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_uuid',
        'election_uuid',
        'first_name',
        'last_name'
    ];
}

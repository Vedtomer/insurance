<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $table = 'policy'; 
    protected $fillable = [
        'agent_name',
        'count_of_net',
        'sum_of_incoming',
        'sum_of_given_amount'
       
    ];
}

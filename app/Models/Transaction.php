<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'net_amount',
        'gst',
        'total_amount',
        'policy_no',
        'policy_id'

    ];


}

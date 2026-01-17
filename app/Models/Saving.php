<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Goal;

class Saving extends Model
{
    use SoftDeletes;

    protected $fillable = ['goal_id', 'amount'];

    public function goal() {
        return $this->belongsTo(Goal::class);
    }
}

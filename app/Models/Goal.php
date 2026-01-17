<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Saving;

class Goal extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'goal', 'starting_goal'];

    public function savings() {
        return $this->hasMany(Saving::class);
    }
}

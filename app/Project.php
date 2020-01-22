<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'place', 'tool', 'start', 'end', 'description'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}

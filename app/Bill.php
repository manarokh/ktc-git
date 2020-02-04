<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $guarded = [];

    public function path(){
        return "/projects/{$this->project->id}/tasks/{$this->task->id}/bills/{$this->id}";
    }
}

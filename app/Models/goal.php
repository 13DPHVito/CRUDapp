<?php
 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'title', 'description', 'start_date', 'due_date', 'completed', 'user_id'
    ];
    public function markAsCompleted()
{
    $this->completed = true;
    $this->save();
}

}

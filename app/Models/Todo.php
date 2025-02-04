<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'date'
    ];

    public function Todo(){
        return $this->belongsTo(User::class); 
    }
}

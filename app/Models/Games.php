<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function top()
    {
        return $this->hasOne(user_game::class, 'game_id');
    }

    protected $hidden = ['created_at', 'updated_at'];

}

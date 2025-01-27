<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'livestock_id',
        'quantity_requested',
        'status',
    ];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// https://github.com/bolaji2274/nas-vue
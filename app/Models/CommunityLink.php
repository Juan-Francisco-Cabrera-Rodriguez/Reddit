<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'channel_id', 'title', 'link', 'approved'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

}

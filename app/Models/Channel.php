<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'color'
    ];

    public function links()
    {
        return $this->hasMany(CommunityLink::class);
    }
}

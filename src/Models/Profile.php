<?php

namespace Pratiksh\Laramin\Models;

use App\Models\User;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use Thumbnail;

    protected $guarded = [];

    // Attribute Casting
    protected $casts = [
        'phone_no' => 'array'
    ];

    // Accessors
    public function getStatusAttribute($attribute)
    {
        return [
            1 => 'Active',
            2 => 'Inactive',
            3 => 'Blocked'
        ][$attribute];
    }

    // Relation
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

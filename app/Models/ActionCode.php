<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ActionCode extends Model
{
    protected $table = 'action_codes';

    protected $fillable = [
        'code',
        'path_pattern',
        'http_method',
        'description',
    ];

    public function userGroups(): BelongsToMany
    {
        return $this->belongsToMany(UserGroup::class, 'user_group_action_codes')
            ->withTimestamps();
    }
}

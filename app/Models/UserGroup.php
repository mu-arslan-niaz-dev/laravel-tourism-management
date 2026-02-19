<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserGroup extends Model
{
    protected $table = 'user_groups';

    protected $fillable = [
        'name',
        'description',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_group_memberships')
            ->withTimestamps();
    }

    public function actionCodes(): BelongsToMany
    {
        return $this->belongsToMany(ActionCode::class, 'user_group_action_codes')
            ->withTimestamps();
    }

    public function scopeGrants(): HasMany
    {
        return $this->hasMany(UserGroupScopeGrant::class, 'group_id');
    }
}


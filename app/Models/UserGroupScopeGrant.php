<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGroupScopeGrant extends Model
{
    protected $table = 'user_group_scope_grants';

    public $incrementing = false;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'group_id',
        'scope_unit_id',
        'grant_mode',
        'created_at',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class, 'group_id');
    }

    public function scopeUnit(): BelongsTo
    {
        return $this->belongsTo(ScopeUnit::class, 'scope_unit_id');
    }
}

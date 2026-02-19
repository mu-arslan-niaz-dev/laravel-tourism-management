<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGroupActionCode extends Model
{
    protected $table = 'user_group_action_codes';

    protected $fillable = [
        'user_group_id',
        'action_code_id',
    ];

    public function userGroup(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class);
    }

    public function actionCode(): BelongsTo
    {
        return $this->belongsTo(ActionCode::class);
    }
}

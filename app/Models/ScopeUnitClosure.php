<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScopeUnitClosure extends Model
{
    protected $table = 'scope_unit_closure';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'int';

    protected $fillable = [
        'ancestor_id',
        'descendant_id',
        'depth',
    ];

    public function ancestor(): BelongsTo
    {
        return $this->belongsTo(ScopeUnit::class, 'ancestor_id');
    }

    public function descendant(): BelongsTo
    {
        return $this->belongsTo(ScopeUnit::class, 'descendant_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model{

    use HasFactory;

    protected $guarded = [];

    protected $filable = [
        'name',
        'owner_id',
    ];

    /**
     * Get the user that owns the Board
     *
     * @return BelongsTo
     */
    public function owner()
    : BelongsTo{
        return $this->belongsTo(User::class);
    }

    /**
     * Get the columns for the Board
     *
     * @return HasMany
     */
    public function columns()
    : HasMany{
        return $this->hasMany(Column::class);
    }

    /**
     * Get the cards for the Board
     *
     * @return HasMany
     */
    public function cards()
    : HasMany{
        return $this->hasMany(Card::class);
    }
}

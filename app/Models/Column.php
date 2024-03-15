<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Column extends Model{

    use HasFactory;

    protected $fillable = [
        'name',
        'board_id',
        'position',
    ];

    protected $guarded = [];

    public static function booted(){
        static::creating(function ($model){
            $model->position = self::query()
                                   ->where('board_id', $model->board_id)
                                   ->orderByDesc('position')
                                   ->first()?->position + 1;
        });
    }

    /**
     * Get the board that owns the Column
     *
     * @return BelongsTo
     */
    public function board()
    : BelongsTo{
        return $this->belongsTo(Board::class);
    }

    /**
     * Get the cards for the Column
     *
     * @return HasMany
     */
    public function cards()
    : HasMany{
        return $this->hasMany(Card::class);
    }
}

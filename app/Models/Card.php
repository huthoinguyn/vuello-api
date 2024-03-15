<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Card extends Model{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'column_id',
        'board_id',
        'position',
        'created_by',
        'due_date',
        'assigned_to',
    ];

    const POSITION_GAP = 60000;

    const POSITION_MIN = 0.00002;

    protected $guarded = [];

    public static function booted(){
        static::creating(function ($model){
            $model->position = self::query()
                                   ->where('column_id', $model->column_id)
                                   ->orderByDesc('position')
                                   ->first()?->position + self::POSITION_GAP;
        });

        static::saved(function ($model){
            if ($model->position < self::POSITION_MIN){
                DB::statement("SET @previousPosition := 0");
                DB::statement(
                    "
                    UPDATE cards
                    SET position = (@previousPosition := @previousPosition + ?)
                    WHERE column_id = ?
                    ORDER BY position
                ",
                    [
                        self::POSITION_GAP,
                        $model->position
                    ]
                );
            }
        });
    }

    public function setDueDateAttribute($value){
        $this->attributes['due_date'] = Carbon::parse($value, 'UTC')
                                              ->addHours(7)
                                              ->format('Y-m-d H:i:s');
    }

    /**
     * Get the column that owns the Card
     *
     * @return BelongsTo
     */
    public function column()
    : BelongsTo{
        return $this->belongsTo(Column::class);
    }

    /**
     * Get the board that owns the Card
     *
     * @return BelongsTo
     */
    public function board()
    : BelongsTo{
        return $this->belongsTo(Board::class);
    }

    /**
     * Get the user that owns the Card
     *
     * @return BelongsTo
     */
    public function createdBy()
    : BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user that owns the Card
     *
     * @return BelongsTo
     */
    public function assignedTo()
    : BelongsTo{
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get the followers for the Card
     *
     * @return belongsToMany
     */
    public function followers()
    : BelongsToMany{
        return $this->belongsToMany(User::class, 'card_followers', 'card_id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'excerpt',
        'remark',
        'rating',
        'house_id',
        'user_id',
        'reservation_id',
    ];
    
    /**
     * Get the user that owns the 2023_02_24_161003_create_ratings_table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the house that owns the 2023_02_24_161003_create_ratings_table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }

    /**
     * Get the reservation that owns the 2023_02_24_161003_create_ratings_table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation()
    {
        return $this->belongsTo(Reser::class);
    }
}

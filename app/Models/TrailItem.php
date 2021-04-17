<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrailItem extends Model
{
    /**
     * Table linked with model
     *
     * @var string
     */
    protected $table = 'trail_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cost'];

    /**
     * Indicates if the model should be timestamped.
     * Note: We don't have a updated_at column in trail_items table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the trail of trail items
     */
    public function trail()
    {
        return $this->belongsTo(Trail::class);
    }
}

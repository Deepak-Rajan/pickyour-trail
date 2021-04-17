<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    /**
     * Table linked with model.
     *
     * @var string
     */
    protected $table = 'trail';

    /**
     * Get the trail items.
     */
    public function trailItems()
    {
        return $this->hasMany(TrailItem::class);
    }
}

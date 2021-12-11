<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    use HasFactory;

    protected $table = 'filters';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $casts = [
        'timestamp' => 'datetime',
    ];

    public function adverts()
    {
        return $this->belongsToMany(Advertisement::class, 'active_filters', 'filter_id', 'advertisement_id');
    }
}

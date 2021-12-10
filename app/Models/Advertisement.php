<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisement';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'contact_info',
        'price',
        'start_date',
        'filter',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $casts = [
        'timestamp' => 'datetime',
        'start_date ' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function filters() {
        return $this->belongsToMany(Filters::class, 'active_filters', 'advertisement_id', 'filter_id');
    }
}

<?php namespace Rebel59\Likeable\Models;

use Model;

/**
 * Like Model
 */
class Like extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'rebel59_likeable_likes';

//    /**
//     * @var array Fillable fields
//     */
//    protected $fillable = [
//        'likeable_id',
//        'likeable_type',
//        'user_id'
//    ];

    public function likeable()
    {
        return $this->morphTo();
    }

}

<?php
namespace Rebel59\Likeable\Traits;

use RainLab\User\Facades\Auth;
use Rebel59\Likeable\Models\Like;

trait Likeable {


    public function scopeWhereLikedBy($query, $userId)
    {
        return $query->whereHas('likes', function($q) use($userId) {
            $q->where('user_id', '=', $userId);
        });
    }


    /**
     * Add a like to this object by the user {$userId) specified.
     * @param integer $userId
     */
    public function like($userId)
    {
        $like = new Like();
        $like->user_id = $userId;
        $this->likes()->save($like);

    }

    /**
     * Remove the like from this object for the user {$userId) specified.
     * @param integer $userId
     */
    public function unlike($userId)
    {
        if(! $like = $this->likes()->where('user_id', $userId)->first())
        {
            return;
        }

        $like->delete();
    }

    /**
     * Has the currently logged in user already "liked" the current object
     *
     * @param integer $userId
     * @return boolean
     */
    public function liked($userId=null)
    {
        if(! $userId)
        {
            $userId = Auth::getUser()->id;
        }

        return (bool) $this->likes()->where('user_id', '=', $userId)->count();
    }


    /**
     * Populate the $model->likeCount attribute
     */
    public function getLikeCountAttribute()
    {
        return $this->likes()->count();
    }

    /**
     * Did the currently logged in user like this model
     * Example : if($book->liked) { }
     * @return boolean
     */
    public function getLikedAttribute()
    {
        return $this->liked();
    }


}
# Likeable Trait
A trait (for OctoberCMS) that makes it possible to "like" other models.

## This repo is currently in active development / unfinished
This trait has been made for an ongoing project. Usage therefore isn't advised until it is finished.

## How to use
Add the trait to the model as you would like with any other trait.
```php
use Rebel59\Likeable\Traits\Likeable;

class Post extends Model 
{
    use Likeable;
    
    
}
```

The trait depens on a morphed relation, so populate the `$morphMany` field.

```php
use Rebel59\Likeable\Traits\Likeable;
use Rebel59\Likeable\Models\Like;

class Post extends Model 
{
    use Likeable;
    
    public $morphMany = [
        'likes' => [Like::class, 'name' => 'likeable']
    ]
}
```

Currently the `Likeable` trait adds the following (working) functionality.

`like($userId)` - Adds a new like to the model from specified user (id).
```php
$model->like($user->id);
```

`unlike($userId)` - Removes a like from the model belonging to the specified user (id).
```php
$model->like($user->id);
```

`scopeWhereLikedBy($query, $userId)` - Find records that are liked by the specified user (id)
```php
$model->whereLikedBy($user->id);
```

`liked($userId=null)` - Check if the currently logged in user / specified user, has liked the record.
```php
$model->liked; // gets currently logged in user and checks if that user had liked the record
$model->liked($userId) //checks if the specified user has liked the record.
```

## License
All this is licensed under the MIT licenes.
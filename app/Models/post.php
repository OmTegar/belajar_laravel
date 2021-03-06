<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    // ];

    protected $guarded=['id'];
    protected $with=['user','category'];
    
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title','like','%'. $filters['search'].'%')
        //     ->orWhere('body','like','% '. $filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false , function($query , $search){
            return $query->where('title','like','% '. $search.'%')
            ->orWhere('body','like','% '. $search.'%');
        });
    }


    public function category(){
        return $this->belongsTo(category::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }

    
}

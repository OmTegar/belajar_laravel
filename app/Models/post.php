<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
    use HasFactory , Sluggable ;

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
            // return $query->whereHas('search', function($query)use ($search){
            //     $query->where('title','body', $search);
            // });
        });

        $query->when($filters['search'] ?? false , function($query , $search){
            return $query->where('body','like','% '. $search.'%')
                        ->orWhere('title','like','% '. $search.'%');
        });

        $query->when($filters['category'] ?? false , function($query , $category){
            return $query->whereHas('category', function($query)use ($category){
                $query->where('slug', $category);
            });
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'content',
    ];

    protected $with = [
        'author',
        'category'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters) : void
    {
        $query->when($filters['Search'] ?? false, 
        fn($query,  $Search)=>
             $query->where('title', 'like', '%' . $Search . '%')
            );

            $query->when($filters['aategory'] ?? false, 
            fn($query,  $category)=>
                 $query->whereHas('cateogry', fn($query) => $query->where('slug', $category))
                );

                $query->when($filters['author'] ?? false, 
                fn($query,  $author)=>
                     $query->whereHas('author', fn($query) => $query->where('username', $author))
                    );
            }

}

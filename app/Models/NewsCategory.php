<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'news_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * الأخبار التابعة لهذا التصنيف (Many-to-Many).
     */
    public function categories()
    {
        return $this->belongsToMany(
            NewsCategory::class,
            'news_category_map',
            'news_id',           // FK للخبر
            'news_category_id'   // FK للتصنيف
        )->withTimestamps();
    }

    public function news()
    {
        return $this->belongsToMany(
            News::class,
            'news_category_map',
            'news_category_id',  // FK للتصنيف
            'news_id'            // FK للخبر
        )->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'image',
        'status',        // Draft | Published
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * التصنيفات المرتبطة بالخبر (Many-to-Many).
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

    /**
     * سكوب الأخبار المنشورة فقط.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'Published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * سكوب الأخبار غير المنشورة (مسودات).
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'Draft');
    }
}

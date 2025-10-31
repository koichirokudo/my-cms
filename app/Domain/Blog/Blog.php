<?php

namespace App\Domain\Blog;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \IdeHelperBlog
 */
class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'is_published',
        'published_at',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    /**
     * @param Builder<self> $query
     */
    public function scopeRecentPublished(Builder $query): Builder
    {
        // 公開日時の降順
        return $query->where('is_published', true)->orderBy('published_at', 'desc');
    }
}

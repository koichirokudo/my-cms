<?php

namespace App\Domain\Inquiry;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperInquiry
 */
class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiries';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime',
    ];

    /**
     * @param Builder<self> $query
     */
    public function scopeRecentInquiries(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }
}

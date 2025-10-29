<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    /**
     * @param Builder<self> $query
     */
    public function scopeRecentInquiries($query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }
}

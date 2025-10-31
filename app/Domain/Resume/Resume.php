<?php

namespace App\Domain\Resume;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \IdeHelperResume
 * @mixin IdeHelperResume
 */
class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'project_name',
        'period_from',
        'period_to',
        'description',
        'team',
        'industry',
        'employment',
        'language_fw',
        'database',
        'server_os',
        'cloud_env',
        'tools',
        'tasks_json',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'period_from' => 'date',
            'period_to' => 'date',
            'tasks_json' => 'array',
        ];
    }

    /**
     * @return BelongsTo<\App\Models\User, self>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @param Builder<self> $query
     */
    public function scopeOrderByPeriod(Builder $query): Builder
    {
        return $query->orderByDesc('period_from')->orderByDesc('period_to');
    }
}

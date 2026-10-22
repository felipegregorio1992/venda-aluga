<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'path',
        'session_id',
        'visitor_hash',
        'viewed_on',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'viewed_on' => 'date',
            'created_at' => 'datetime',
        ];
    }

    public static function record(string $path, string $sessionId, string $visitorHash): void
    {
        static::query()->create([
            'path' => mb_substr($path, 0, 255),
            'session_id' => $sessionId,
            'visitor_hash' => $visitorHash,
            'viewed_on' => now()->toDateString(),
            'created_at' => now(),
        ]);
    }

    public static function stats(): array
    {
        $today = now()->toDateString();
        $weekStart = now()->subDays(6)->toDateString();
        $monthStart = now()->startOfMonth()->toDateString();

        return [
            'total' => static::query()->count(),
            'today' => static::query()->whereDate('viewed_on', $today)->count(),
            'week' => static::query()->whereDate('viewed_on', '>=', $weekStart)->count(),
            'month' => static::query()->whereDate('viewed_on', '>=', $monthStart)->count(),
            'unique_today' => static::query()->whereDate('viewed_on', $today)->distinct('visitor_hash')->count('visitor_hash'),
            'unique_week' => static::query()->whereDate('viewed_on', '>=', $weekStart)->distinct('visitor_hash')->count('visitor_hash'),
            'unique_total' => static::query()->distinct('visitor_hash')->count('visitor_hash'),
            'top_pages' => static::query()
                ->select('path', DB::raw('COUNT(*) as views'))
                ->groupBy('path')
                ->orderByDesc('views')
                ->limit(6)
                ->get(),
            'daily' => static::query()
                ->select('viewed_on', DB::raw('COUNT(*) as views'), DB::raw('COUNT(DISTINCT visitor_hash) as visitors'))
                ->whereDate('viewed_on', '>=', $weekStart)
                ->groupBy('viewed_on')
                ->orderBy('viewed_on')
                ->get()
                ->map(fn ($row) => [
                    'date' => Carbon::parse($row->viewed_on)->format('d/m'),
                    'views' => (int) $row->views,
                    'visitors' => (int) $row->visitors,
                ]),
        ];
    }
}

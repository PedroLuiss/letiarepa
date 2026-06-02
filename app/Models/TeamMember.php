<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['name', 'title', 'description', 'image', 'sort_order'];

    public function getInitialsAttribute(): string
    {
        $parts = explode(' ', $this->name);
        return collect($parts)
            ->map(fn($p) => strtoupper($p[0] ?? ''))
            ->take(2)
            ->implode('');
    }

    public function getHasImageAttribute(): bool
    {
        return !empty($this->image) && file_exists(public_path($this->image));
    }
}

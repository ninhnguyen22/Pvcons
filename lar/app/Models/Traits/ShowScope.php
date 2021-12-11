<?php

namespace App\Models\Traits;

trait ShowScope
{
    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeShow($query)
    {
        $query->where('is_show', true);
    }
}

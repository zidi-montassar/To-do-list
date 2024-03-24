<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'done'
    ];

    protected $casts = [
        'done' => 'boolean',
        'deadline' => 'string'
    ];

    public function slug(): string
    {
        return Str::slug($this->name);
    }

    public function scopeDone(Builder $builder, bool $done): Builder
    {
        return $builder->where('done', $done === false ? '0' : '1');
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }
}

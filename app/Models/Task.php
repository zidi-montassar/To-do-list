<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'done'
    ];

    public function slug(): string
    {
        return Str::slug($this->name);
    }
}

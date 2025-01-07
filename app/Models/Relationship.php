<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    /**
     * Les colonnes qui peuvent être massivement assignées.
     */
    protected $fillable = [
        'created_by',
        'parent_id',
        'child_id',
    ];
}

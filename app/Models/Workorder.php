<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    /** @use HasFactory<\Database\Factories\WorkorderFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'description',
        'start',
        'end',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}

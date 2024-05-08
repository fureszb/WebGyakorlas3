<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriak extends Model
{
    use HasFactory;

    protected $table = "kategoriak";
    protected $primaryKey = "id";
    protected $fillable = [
        'nev',
    ];

    public function ingatlanok()
    {

        return $this->hasMany(Ingatlanok::class, 'kategoria', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingatlanok extends Model
{
    use HasFactory;
    protected $table = "ingatlanok";
    protected $primaryKey = "id";
    protected $fillable = [
        "kategoria",
        "leiras",
        "hierdetesDatuma",
        "tehermentes",
        "ar",
        "kepUrl"
    ];

    public function kategoriak()
    {
        return $this->belongsTo(Kategoriak::class, 'kategoria', 'id');
    }
}

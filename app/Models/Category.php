<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plant;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
    ];
    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}

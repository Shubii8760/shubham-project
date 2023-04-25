<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;



class Note extends Model
{
    use HasFactory;

    protected $table = "note";

    protected $primarykey = "id";

    protected $fillable = [
        'title',
        'slug',
        'file',
        'description',
    ];


    use Sluggable;

    protected $guarded = [];  //making a array //


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

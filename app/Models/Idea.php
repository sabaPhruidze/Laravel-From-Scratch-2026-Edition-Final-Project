<?php

namespace App\Models;

use App\IdeaStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;
    protected $casts = [ 
      
        'links' => AsArrayObject::class,   // database-იდან წამოღებული მონაცემები როგორ ფორმატში მოგვცეს
        'status'=> IdeaStatus::class, //enum შევქმენით, რომ status მნიშვნელობები არ ვწეროთ ყველგან უბრალო ტექსტად
    ];
}

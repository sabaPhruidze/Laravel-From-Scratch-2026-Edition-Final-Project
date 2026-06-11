<?php

namespace App\Models;

use App\IdeaStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;
    protected $casts = [ 
      
        'links' => AsArrayObject::class,   // database-იდან წამოღებული მონაცემები როგორ ფორმატში მოგვცეს
        'status'=> IdeaStatus::class, //enum შევქმენით, რომ status მნიშვნელობები არ ვწეროთ ყველგან უბრალო ტექსტად
    ];
    protected $attributes = [
        'status' => IdeaStatus::PENDING, // initial status value
    ];
    public function user(): BelongsTo //ეს idea ეკუთვნის ერთ user-ს.
    {
        return $this->belongsTo(User::class);
    }
    public function steps():HasMany // ამ idea-ს აქვს ბევრი step. ერთი idea-ს ბევრი step შეიძლება ჰქონდეს.
    {
        return $this->hasMany(Step::class);
    }
}


<?php

namespace App\Models;

use App\IdeaStatus;
use Attribute;
use Database\Factories\IdeaFactory;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection as SupportCollection;

class Idea extends Model
{
    /** @use HasFactory<IdeaFactory> */
    use HasFactory;

    protected $casts = [

        'links' => AsArrayObject::class,   // database-იდან წამოღებული მონაცემები როგორ ფორმატში მოგვცეს
        'status' => IdeaStatus::class, // enum შევქმენით, რომ status მნიშვნელობები არ ვწეროთ ყველგან უბრალო ტექსტად
    ];

    protected $attributes = [
        'status' => IdeaStatus::PENDING->value, // initial status value
    ];

    public static function statusCounts(User $user): SupportCollection
    {
        $counts = $user->ideas()
            ->selectRaw('status,count(*) as count')
            ->groupBy('status')->pluck('count', 'status');

        return collect(IdeaStatus::cases())->mapWithKeys(fn ($status) => [
            $status->value => $counts->get($status->value, 0),
            // გამოიტანე მხოლოდ count, მაგრამ key-ად გამოიყენე status.
        ])->put('all', $user->ideas()->count());
        //    ჩვეულებრივ ნულზე არაფერ გამოაჩენდა და რომ გამოაჩინსო მაგიტომ გავწერეთ collect
        // return $statusCounts;// საჩვენებლად რამდენ რამდენია
    }

    public function user(): BelongsTo // ეს idea ეკუთვნის ერთ user-ს.
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): HasMany // ამ idea-ს აქვს ბევრი step. ერთი idea-ს ბევრი step შეიძლება ჰქონდეს.
    {
        return $this->hasMany(Step::class);
    }
    // public function formattedDescription():Attribute
    // {
    //     return Attribute::get(fn($value,$attributes) => str($attributes['description']));
    // }
}

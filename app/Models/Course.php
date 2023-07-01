<?php

namespace App\Models;

use App\Enums\CourseUserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'thumbnail',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->wherePivot('relation', '=', CourseUserRelation::Instructor);
    }

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (Course $course) {
            $course->lectures->each(fn (Lecture $lecture) => $lecture->delete());
        });
    }
}

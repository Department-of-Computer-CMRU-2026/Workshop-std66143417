<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Registration; // เพิ่มบรรทัดนี้

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'speaker',
        'location',
        'total_seats',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function getRegistrationsCountAttribute(): int
    {
        return $this->registrations()->count();
    }

    public function getAvailableSeatsAttribute(): int
    {
        return max(0, $this->total_seats - $this->registrations()->count());
    }

    public function getIsFullAttribute(): bool
    {
        return $this->registrations()->count() >= $this->total_seats;
    }

    public function isRegisteredByUser(int $userId): bool
    {
        return $this->registrations()->where('user_id', $userId)->exists();
    }
}
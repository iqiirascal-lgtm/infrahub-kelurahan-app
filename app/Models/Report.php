<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'facility_category_id',
        'title',
        'description',
        'location_rtrw',
        'photo',
        'status',
        'upvotes_count'
    ];

    protected $casts = [
        'upvotes_count' => 'integer',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke FacilityCategory
    public function category()
    {
        return $this->belongsTo(FacilityCategory::class, 'facility_category_id');
    }
}
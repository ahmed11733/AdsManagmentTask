<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'start_date',
        'category_id',
        'advertiser_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'ad_tags');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class book extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the auther that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function search_words(): BelongsTo
    {
        return $this->belongsTo(auther::class,'auther_id','id');
    }

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    /**
     * Get the publisher that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publisher::class);
    }

    /**
     * Get the Image that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    /**
     * Get the File that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function File(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    /**
     * Get the Voice that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Voice(): BelongsTo
    {
        return $this->belongsTo(Voice::class, 'voice_id', 'id');
    }

}

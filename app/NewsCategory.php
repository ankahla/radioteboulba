<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class NewsCategory extends Model
{
    use SoftDeletes;

    public $table = 'news_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        '1' => 'INCLUDED',
        '0' => 'EXCLUDED',
    ];

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'color',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categoryNews()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}

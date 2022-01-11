<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ArticleCategory extends Model
{
    use SoftDeletes;

    public $table = 'article_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        '0' => 'EXCLUDED',
        '1' => 'INCLUDED',
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

    public function categoryArticles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}

<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Article.
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $category_id
 * @property int $is_public
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property-read Category|null $category
 * @property-read string $short_body
 * @method static ArticleFactory factory(...$parameters)
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereBody($value)
 * @method static Builder|Article whereCategoryId($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereIsPublic($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['title', 'body', 'category_id', 'is_public'];

    public $sortable = ['id',
        'title',
        'body',
        'category_id',
        'is_public',
        'created_at',
        'updated_at',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 記事の内容を省略して表示する.
     * @return string
     */
    public function getShortBodyAttribute(): string
    {
        $limit = 30;
        if (mb_strlen($this->body) > $limit) {
            return mb_substr($this->body, 0, $limit) . '...';
        }

        return $this->body;
    }
}

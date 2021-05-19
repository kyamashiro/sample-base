<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Category.
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property-read Article $article
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|Category sortable($defaultParameters = null)
 */
class Category extends Model
{
    use HasFactory;
    use Sortable;

//    public function article()
//    {
//        return $this->belongsTo(Article::class);
//    }
}

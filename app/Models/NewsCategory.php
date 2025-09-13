<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsCategory
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 *
 * @property Collection|News[] $news
 *
 * @package App\Models
 */
class NewsCategory extends Model
{
	use SoftDeletes;
	protected $table = 'news_categories';
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public function news()
	{
		return $this->hasMany(News::class, 'news_category_id');
	}



    #[scope]
    public function applySearch(Builder $query):void
    {
        $request = request();
        $query
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $keyword = $request->query('search');
                $query->whereAny([
                    'title',
                    'abstract',
                    'description'
                ], 'LIKE', "%$keyword%");
            });
    }

    #[scope]
    public function applySort(Builder $query):void
    {
        $request = request();

        switch ($request->query('sort', 'newest')) {
            case 'oldest':
            {
                $query
                    ->orderBy('created_at');
                break;
            }
            case 'title_desc':
            {
                $query
                    ->orderByDesc('title');
                break;
            }
            case 'title_asc':
            {
                $query
                    ->orderBy('title');
                break;
            }
            default:
            {
                $query->orderByDesc('created_at');
            }
        }

    }
}

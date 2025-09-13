<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\NewsStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 *
 * @property int $id
 * @property int $admin_id
 * @property string $title
 * @property string $abstract
 * @property string $description
 * @property int $news_category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 *
 * @property Admin $admin
 * @property NewsCategory $newsCategory
 * @property Collection|Comment[] $comments
 * @property Collection|NewsImage[] $newsImages
 *
 * @package App\Models
 */
class News extends Model
{
	use SoftDeletes;
	protected $table = 'news';
	public static $snakeAttributes = false;

	protected $casts = [
		'admin_id' => 'int',
		'news_category_id' => 'int',
		'status' => NewsStatus::class,
	];

	protected $fillable = [
		'admin_id',
		'title',
		'abstract',
		'description',
		'news_category_id',
		'status'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function newsCategory()
	{
		return $this->belongsTo(NewsCategory::class, 'news_category_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function newsImages()
	{
		return $this->hasMany(NewsImage::class);
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

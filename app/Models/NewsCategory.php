<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
		return $this->hasMany(News::class, 'news_cateory_id');
	}
}

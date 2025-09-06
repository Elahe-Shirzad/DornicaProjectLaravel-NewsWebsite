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
 * Class News
 * 
 * @property int $id
 * @property int $admin_id
 * @property string $title
 * @property string $abstract
 * @property string $description
 * @property int $news_cateory_id
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
		'news_cateory_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'admin_id',
		'title',
		'abstract',
		'description',
		'news_cateory_id',
		'status'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function newsCategory()
	{
		return $this->belongsTo(NewsCategory::class, 'news_cateory_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function newsImages()
	{
		return $this->hasMany(NewsImage::class);
	}
}

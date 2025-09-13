<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Favorite
 * 
 * @property int $id
 * @property int $user_id
 * @property int $news_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property News $news
 * @property User $user
 *
 * @package App\Models
 */
class Favorite extends Model
{
	protected $table = 'favorites';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'news_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'news_id'
	];

	public function news()
	{
		return $this->belongsTo(News::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

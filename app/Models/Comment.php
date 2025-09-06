<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int $news_id
 * @property int|null $feedback_comment_id
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deteted_at
 * @property int $status
 * 
 * @property User|null $user
 * @property News $news
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'news_id' => 'int',
		'feedback_comment_id' => 'int',
		'deteted_at' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'news_id',
		'feedback_comment_id',
		'content',
		'deteted_at',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function news()
	{
		return $this->belongsTo(News::class);
	}
}

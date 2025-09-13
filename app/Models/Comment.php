<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\CommentStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 *
 * @property int $id
 * @property int|null $admin_id
 * @property int|null $user_id
 * @property int $news_id
 * @property int|null $feedback_comment_id
 * @property string|null $name
 * @property string|null $email
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 *
 * @property User|null $user
 * @property News $news
 * @property Admin|null $admin
 * @property Comment|null $comment
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Comment extends Model
{
	use SoftDeletes;
	protected $table = 'comments';
	public static $snakeAttributes = false;

	protected $casts = [
		'admin_id' => 'int',
		'user_id' => 'int',
		'news_id' => 'int',
		'feedback_comment_id' => 'int',
		'status' => CommentStatus::class
	];

	protected $fillable = [
		'admin_id',
		'user_id',
		'news_id',
		'feedback_comment_id',
		'name',
		'email',
		'content',
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

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function comment()
	{
		return $this->belongsTo(Comment::class, 'feedback_comment_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'feedback_comment_id');
	}
}

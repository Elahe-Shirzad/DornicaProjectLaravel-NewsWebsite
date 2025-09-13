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
 * Class Admin
 * 
 * @property int $id
 * @property int $admin_role_id
 * @property string $first_name
 * @property string $last_name
 * @property string $national_code
 * @property int $gender
 * @property string $mobile
 * @property string $email
 * @property int|null $avatar_file_id
 * @property string $username
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 * 
 * @property AdminRole $adminRole
 * @property File|null $file
 * @property Collection|Comment[] $comments
 * @property Log|null $log
 * @property Collection|News[] $news
 *
 * @package App\Models
 */
class Admin extends Model
{
	use SoftDeletes;
	protected $table = 'admins';
	public static $snakeAttributes = false;

	protected $casts = [
		'admin_role_id' => 'int',
		'gender' => 'int',
		'avatar_file_id' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'admin_role_id',
		'first_name',
		'last_name',
		'national_code',
		'gender',
		'mobile',
		'email',
		'avatar_file_id',
		'username',
		'password',
		'status'
	];

	public function adminRole()
	{
		return $this->belongsTo(AdminRole::class);
	}

	public function file()
	{
		return $this->belongsTo(File::class, 'avatar_file_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function log()
	{
		return $this->hasOne(Log::class);
	}

	public function news()
	{
		return $this->hasMany(News::class);
	}
}

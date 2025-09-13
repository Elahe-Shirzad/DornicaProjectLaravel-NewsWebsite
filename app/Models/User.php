<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\MilitaryServiceStatus;
use App\Enums\UserStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $national_code
 * @property int $gender
 * @property string $mobile
 * @property string $email
 * @property int|null $avatar_file_id
 * @property string $username
 * @property string $password
 * @property int|null $province_id
 * @property int|null $city_id
 * @property int|null $military_service_status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 *
 * @property File|null $file
 * @property City|null $city
 * @property Collection|Comment[] $comments
 * @property Collection|Favorite[] $favorites
 * @property Collection|SiteView[] $siteViews
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'gender' => 'int',
		'avatar_file_id' => 'int',
		'province_id' => 'int',
		'city_id' => 'int',
		'military_service_status' => MilitaryServiceStatus::class,
		'status' => UserStatus::class
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'national_code',
		'gender',
		'mobile',
		'email',
		'avatar_file_id',
		'username',
		'password',
		'province_id',
		'city_id',
		'military_service_status',
		'status'
	];

	public function file()
	{
		return $this->belongsTo(File::class, 'avatar_file_id');
	}

	public function city()
	{
		return $this->belongsTo(City::class, 'province_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}

	public function siteViews()
	{
		return $this->hasMany(SiteView::class);
	}
}

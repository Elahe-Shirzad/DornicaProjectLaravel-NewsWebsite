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
 * Class AdminRole
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 * 
 * @property Collection|Admin[] $admins
 *
 * @package App\Models
 */
class AdminRole extends Model
{
	use SoftDeletes;
	protected $table = 'admin_roles';
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public function admins()
	{
		return $this->hasMany(Admin::class, 'admin_rolel_id');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $admin_id
 * @property bool $operation
 * @property Carbon $created_at
 * 
 * @property Admin $admin
 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'admin_id' => 'int',
		'operation' => 'bool'
	];

	protected $fillable = [
		'id',
		'admin_id',
		'operation'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}
}

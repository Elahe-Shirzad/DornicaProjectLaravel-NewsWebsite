<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteView
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $url
 * @property string $ip_address
 * @property string|null $user_agent
 * @property Carbon $created_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class SiteView extends Model
{
	protected $table = 'site_views';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'url',
		'ip_address',
		'user_agent'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

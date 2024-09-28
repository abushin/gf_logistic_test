<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель доставки
 *
 * @property int $id
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    protected $hidden = [
        self::CREATED_AT,
        self::UPDATED_AT,
    ];
}

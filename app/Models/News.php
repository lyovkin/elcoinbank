<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models
 */
class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'text'];
}

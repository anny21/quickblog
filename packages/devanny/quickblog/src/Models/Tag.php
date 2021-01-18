<?php

namespace Devanny\QuickBlog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

}

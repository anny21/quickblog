<?php
namespace Devanny\QuickBlog\Contracts;

interface PostContract
{

    public function getCategoryAttribute($value);

    public function getCreatedAtAttribute($value);
}

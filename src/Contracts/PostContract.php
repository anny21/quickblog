<?php
namespace Devanny\QuickBlog\Contracts;


Interface PostContract{
    
    public function getCategoryAttribute($value);

    public function getCreatedAtAttribute($value);
}
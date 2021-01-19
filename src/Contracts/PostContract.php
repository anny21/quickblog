<?php
namespace Devanny\QuickBlog\Contract;


Interface PostContract{
    
    public function getCategoryAttribute($value);

    public function getCreatedAtAttribute($value);
}
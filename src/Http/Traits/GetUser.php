<?php

namespace Devanny\QuickBlog\Http\Traits;


trait GetUser {

     public function getUser(){
        
        if(config('quickblog.auth') == 'Auth'){
          return  auth()->id();
        }

        return null;
}


}
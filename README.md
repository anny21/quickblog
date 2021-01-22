

## About QuickBlog

Quickblog is a laravel package for creating quick and fast blog for your application, It includes:

- Auth config to restrict pages
- Categories
- Tags
- Blog view that can be customized to your desire and
- Blog banner upload


## Installation

    composer require devanny/quickblog
 
## After installation publish vendor files and run migration

    php artisan vendor:publish --provider="Devanny\QuickBlog\QuickBlogServiceProvider" --tag="blog"
    
    php artisan migrate
    
    php artisan storage:link 
 
    
## Config

    *** if you will be using authentication.. open config/quickblog and change auth value to 'Auth' ***

## Routes

    /posts - Get all blog posts
    /categories - Get all Categories and create new category 
    /tags - Get all Tags and create new tag

### Premium Partners

- Non yet

## Contributors

- <a href="https://github.com/anny21">anny21</a>

## License

The library is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

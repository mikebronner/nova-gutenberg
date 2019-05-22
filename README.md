# Nova Gutenberg
Implementation of the Gutenberg editor as a Laravel Nova Field based on Laraberg.

## Requirements
- Laravel Nova
- PHP 7.1.0+

## Installation
```sh
composer require genealabs/nova-gutenberg:*
```

## Usage
```php
use GeneaLabs\NovaGutenberg\Gutenberg;

class BlogPost extends Resource
{
    // ...

    public function fields(Request $request) : array
    {
        return [
            // ...
            Gutenberg::make("Content"),
            // ...
        ];
    }

    // ...
}
```

### Preview
<img width="1658" alt="Screen Shot 2019-05-22 at 12 30 21 PM" src="https://user-images.githubusercontent.com/1791050/58202822-6ba94880-7c8d-11e9-9cae-4cc220496be5.png">

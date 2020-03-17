# Nova Gutenberg
Implementation of the [Gutenberg editor](https://wordpress.org/gutenberg/) as a Laravel Nova Field based on [Laraberg](https://github.com/VanOns/laraberg).

![Gutenberg For Laravel Nova masthead image.](https://repository-images.githubusercontent.com/188099261/91913580-f1b8-11e9-8e2e-9a3f6e6da8c2)

## Requirements
- Laravel Nova
- PHP 7.1.0+

## Implemented Functionality
- [X] Editor field in form.
- [X] Field on index listing.
- [X] Field on resource display.
- [X] Image upload functionality.

## Limitations
1. Currently you can only have one Gutenberg field on a given page, due to how
  the Gutenberg library is implemented. Efforts are being made to address this
  upstream, but it has yet to be determined if that is possible.
2. The editor UI still allows and prompts for drag-and-drop functionality.
  Unfortunately that is currently not functional, and the Media Library button
  must be used instead.

## Installation
1. Install the package:
  ```sh
  composer require genealabs/nova-gutenberg
  ```

2. Publish Laravel FileManager's assets and config:
  ```sh
  php artisan vendor:publish --tag=lfm_config
  php artisan vendor:publish --tag=lfm_public
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

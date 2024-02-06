<?php

namespace GeneaLabs\NovaGutenberg;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\AsHTML;

class Gutenberg extends Text
{

    public $asHtml = true;

    public $fullWidth = true;

    public $component = 'nova-gutenberg';

    public function disableWelcome(): self
    {
        $this->withMeta(['disable_welcome' => true]);

        return $this;
    }

    public function enableWelcome(): self
    {
        $this->withMeta(['disable_welcome' => false]);

        return $this;
    }
}

<?php namespace GeneaLabs\NovaGutenberg;

use Laravel\Nova\Fields\Field;

class Gutenberg extends Field
{
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

<?php namespace GeneaLabs\NovaGutenberg;

use Laravel\Nova\Fields\Field;

class Gutenberg extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-gutenberg';

    public function disableWelcome($value = true) {
        $this->withMeta(['disable_welcome' => $value]);
        return $this;
    }
}

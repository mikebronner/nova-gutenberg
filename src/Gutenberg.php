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

    public function disableWelcome() {
        $this->withMeta(['disable_welcome' => true]);
        return $this;
    }
}

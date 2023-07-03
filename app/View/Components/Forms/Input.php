<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $value;
    public $label;
    public $example;
    public $placeholder;
    public $required;
    public $disabled;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$name,$value=NULL,$label,$example=NULL,$placeholder=NULL,$required=NULL,$disabled=NULL,$readonly=NULL)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->example = $example;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}

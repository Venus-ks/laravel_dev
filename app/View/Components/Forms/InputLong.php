<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputLong extends Component
{
    public $type;
    public $name;
    public $value;
    public $label;
    public $placeholder;
    public $example;
    public $required;
    public $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$name,$value=NULL,$label,$placeholder=NULL,$example=NULL,$required=NULL,$disabled=NULL)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->example = $example;
        $this->required = $required;
        if($disabled) $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-long');
    }
}

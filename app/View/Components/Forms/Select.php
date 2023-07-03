<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $option;
    public $label;
    public $attr;
    public $value;
    public $required;
    public $disabled;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name=NULL,$label,$option,$attr=NULL,$value=NULL,$required=NULL,$disabled=NULL,$readonly=NULL)
    {
        $this->name = $name;
        $this->label = $label;
        $this->option = $option;
        $this->attr = $attr;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}

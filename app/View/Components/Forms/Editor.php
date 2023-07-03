<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Editor extends Component
{
    public $id;
    public $label;
    public $name;
    public $placeholder;
    public $example;
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$label,$name,$placeholder=NULL,$example=NULL,$required=NULL)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->example = $example;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.editor');
    }
}

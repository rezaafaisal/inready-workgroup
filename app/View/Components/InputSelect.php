<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label, $name, $option, $data_select;
    
    public function __construct($label, $name, $option, $dataselect)
    {
        $this->label = $label;
        $this->$name = $name;
        $this->option = $option;
        $this->data_select = $dataselect;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-select');
    }
}

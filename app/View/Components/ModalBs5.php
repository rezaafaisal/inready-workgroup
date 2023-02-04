<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalBs5 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $target, $title;
     
    public function __construct($target, $title)
    {
        $this->target = $target;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-bs5');
    }
}

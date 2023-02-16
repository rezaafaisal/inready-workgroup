<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class ProfileSetting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $route, $submit;
    public function __construct($title, $route, $submit = null)
    {
        $this->title = $title;
        $this->route = $route;
        $this->submit = $submit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.profile-setting');
    }
}

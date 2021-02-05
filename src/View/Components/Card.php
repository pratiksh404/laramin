<?php

namespace Pratiksh\Laramin\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;

    public $theme;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $theme = '')
    {
        $this->title = $title;
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('laramin::components.card');
    }
}

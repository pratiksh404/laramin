<?php

namespace Pratiksh\Laramin\View\Components;

use Illuminate\View\Component;

class ShowPage extends Component
{
    public $name;

    public $route;

    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $route, $model)
    {
        //
        $this->name = $name;
        $this->route = $route;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('laramin::components.show-page');
    }
}

<?php

namespace Pratiksh\Laramin\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class IndexPage extends Component
{
    public $name;
    public $plural_name;
    public $property;
    public $route;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $property = '', $route)
    {
        //
        $this->name = Str::ucfirst($name);
        $this->plural_name = Str::plural(Str::ucfirst($name));
        $this->property = $property;
        $this->route = $route;
        $this->class = $this->makeDynamicClass($this->name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('laramin::components.index-page');
    }

    protected function makeDynamicClass($name)
    {
        if ($name == 'User') {
            $className = 'App\\Models\\' . Str::ucfirst($name);
        } else {
            $className = 'Pratiksh\Laramin\Models\\' . Str::ucfirst($name);
        }
        return (new  $className);
    }
}

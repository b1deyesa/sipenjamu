<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $createComponent = null, 
        public $updateComponentPrefix = null,
        public $deleteComponentPrefix = null,
        public $reviewComponentPrefix = null,
        public $items = [],
        public $searchField = ['name']
    )
    {
       $this->createComponent = $createComponent;
       $this->updateComponentPrefix = $updateComponentPrefix;
       $this->deleteComponentPrefix = $deleteComponentPrefix;
       $this->reviewComponentPrefix = $reviewComponentPrefix;
       $this->items = $items;
       $this->searchField = $searchField;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.crud-table');
    }
}

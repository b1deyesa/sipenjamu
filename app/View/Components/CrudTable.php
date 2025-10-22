<?php

namespace App\View\Components;

use App\Models\Periode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudTable extends Component
{
    public $periodes;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $periode = true, 
        public $createComponent = null, 
        public $updateComponentPrefix = null,
        public $deleteComponentPrefix = null,
        public $reviewComponentPrefix = null,
        public $items = [],
        public $searchField = ['name']
    )
    {
       $this->periode = $periode;
       $this->createComponent = $createComponent;
       $this->updateComponentPrefix = $updateComponentPrefix;
       $this->deleteComponentPrefix = $deleteComponentPrefix;
       $this->reviewComponentPrefix = $reviewComponentPrefix;
       $this->items = $items;
       $this->searchField = $searchField;
       
       $this->periodes = Periode::orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.crud-table');
    }
}

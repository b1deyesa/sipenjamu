<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $id = null,
        public $type = 'bar',
        public $height = '500px',
        public $labels = [],
        public $datas = [],
        public $backgrounds = []
    ) {
        $this->id = $id ?? 'chart-' . uniqid();
        $this->type = $type;
        $this->labels = $labels;
        $this->datas = $datas;
        $this->backgrounds = $backgrounds;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chart');
    }
}

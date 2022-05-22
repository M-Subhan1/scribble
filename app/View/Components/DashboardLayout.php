<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardLayout extends Component
{
    /**
     * Current Page
     *
     * @var string
     */
    public $currentPage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-layout');
    }
}

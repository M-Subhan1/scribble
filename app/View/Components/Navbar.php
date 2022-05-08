<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
    * Is Current Page, Auth Page.
    *
    * @var boolean
    */
    public $isAuthorized;

    /**
    * Is User loggied_in
    *
    * @var boolean
    */
    public $isLoggedIn;

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
    public function __construct($isAuthorized, $isLoggedIn, $currentPage)
    {
        $this->isAuthorized = $isAuthorized;
        $this->isLoggedIn = $isLoggedIn;
        $this->currentPage = $currentPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}

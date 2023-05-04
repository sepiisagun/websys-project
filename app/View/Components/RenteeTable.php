<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class RenteeTable extends Component
{
    public $house;

    public function __construct($house)
    {
        $this->house = $house;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.account.rentee-table-item');
    }
}

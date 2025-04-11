<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $href;
    public $type;

    public function __construct($href = '#', $type = '')
    {
        $this->href = $href;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.button');
    }
}
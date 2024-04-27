<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteConfirmationModal extends Component
{
    public $itemId;
    public $deleteRoute;

    public function __construct($itemId, $deleteRoute)
    {
        $this->itemId = $itemId;
        $this->deleteRoute = $deleteRoute;
    }

    public function render()
    {
        return view('components.delete-confirmation-modal');
    }
}

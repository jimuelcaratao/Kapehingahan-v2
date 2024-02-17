<?php

namespace App\View\Components\Order;

use App\Models\User;
use Illuminate\View\Component;

class UpdateOrderModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $riders = User::where('is_admin', 3)->get();
        return view('components.order.update-order-modal', [
            'riders' => $riders,
        ]);
    }
}

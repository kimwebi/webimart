<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrdersList extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = auth()->user()
            ?->orders()->latest()->get() ?? collect();;

    }
    public function render()
    {
        return view('livewire.orders-list', ['orders' => $this->orders]);
    }
}

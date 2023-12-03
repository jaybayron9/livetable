<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;

class PaymentForm extends Component
{
    public $row_id = 0;
    public $name;
    public $product;
    public $price;
    public $total_due;

    #[On('fill_form')]
    public function fill_form($pays = null) {
        $this->row_id = $pays['id'];
        $this->name = $pays['name'];
        $this->product = $pays['product'];
        $this->price = $pays['price'];
        $this->total_due = $pays['total_due'];
    }

    public function process_payment() {
        $this->validate([
            'row_id' => ['required'],
            'name' => ['required'],
            'product' => ['required'],
            'price' => ['required', 'numeric'],
            'total_due' => ['required', 'numeric'], 
        ]);

        Payment::updateOrCreate([
            'id' => $this->row_id
        ], [
            'name' => $this->name,
            'product' => $this->product,
            'price' => $this->price,
            'total_due' => $this->total_due
        ]);

        $this->reset(['row_id', 'name', 'product', 'price', 'total_due']);
        $this->dispatch('payment_table');
    }
    
    public function render()
    {
        return view('livewire.payment-form');
    }
}

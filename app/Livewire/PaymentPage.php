<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;

class PaymentPage extends Component
{
    public $selectedRows = [];
    public $isChecked = false; 

    public function checkbox() 
    {
        if ($this->isChecked) {
            $this->isChecked = false;
        } else {
            $this->isChecked = true;
        }
    }

    public function delete_rows() 
    {
        $this->deleteSelectedRows();
    }

    public function deleteSelectedRows()
    { 
        Payment::whereIn('id', $this->selectedRows)->delete(); 
        $this->selectedRows = [];
    }

    public function fillout_edit($id)
    { 
        $pays = Payment::where('id', $id)->get()->first();   
        $this->dispatch('fill_form', $pays);
    }


    public function delete_row($id) {
        $payment = Payment::find($id);
        $payment->delete();
    }

    #[On('payment_table')]
    public function render()
    {
        return view('livewire.payment-page', [
            'payments' => Payment::all()
        ]);
    }
}

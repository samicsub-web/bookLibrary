<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $transactions = Transaction::with(['user', 'book'])->latest()->get();
        return view('livewire.transaction.index', ['transactions' => $transactions]);
    }
}

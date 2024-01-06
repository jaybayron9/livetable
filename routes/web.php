<?php

use App\Livewire\PaymentPage;
use App\Livewire\Job\Applications;
use Illuminate\Support\Facades\Route; 

Route::get('/', PaymentPage::class);
Route::get('/job', Applications::class);

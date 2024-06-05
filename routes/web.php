<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::post('contact', [ContactController::class, 'send'])
    ->middleware(ProtectAgainstSpam::class, 'throttle:send');


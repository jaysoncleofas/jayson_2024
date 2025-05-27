@php

  use App\Models\Work;
  use Carbon\Carbon;
  use Illuminate\Support\Facades\Artisan;

  $works = Work::all();
  Artisan::call('inspire');
  $inspiration = Artisan::output();

@endphp

@extends('layout')

@section('title', '')

@section('content')
<div class="sm:px-8 mt-9">
  <div class="mx-auto w-full max-w-7xl lg:px-8">
    <div class="relative px-4 sm:px-8 lg:px-12">
      <div class="mx-auto max-w-2xl lg:max-w-5xl">
        <div class="max-w-full">
          <p class="mt-6 text-base text-center text-zinc-600 dark:text-zinc-400">{{ $inspiration }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
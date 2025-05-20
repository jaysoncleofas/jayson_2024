@php

  use App\Models\Work;
  use Carbon\Carbon;

  $works = Work::all();

@endphp

@extends('layout')

@section('title', '')

@section('content')
<div class="sm:px-8 mt-9">
  <div class="mx-auto w-full max-w-7xl lg:px-8">
    <div class="relative px-4 sm:px-8 lg:px-12">
      <div class="mx-auto max-w-2xl lg:max-w-5xl">
        <div class="max-w-full">
          <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
            {{ get_setting('heroTitle') }}
          </h1>
          <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
            {{ get_setting('heroSubtitle') }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
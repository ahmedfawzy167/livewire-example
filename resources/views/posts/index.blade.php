@extends('components.layouts.app')

@section('title')
    Posts
@endsection

@section('content')

<div class="container mt-2">
    @livewire('post-form')
</div>

@endsection
    


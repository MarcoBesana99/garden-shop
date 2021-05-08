@extends('layouts.base')
@section('content')
    <div class="container mt-4">
        <div>{{ __('Documentation') }}</div>
        {{-- @foreach ($products as $product)
            {{ $product->name }}
            {{ $product->description }}
        @endforeach --}}
        <livewire:form />
    </div>
@endsection
@section('scripts')
    <script>
        $('#products').dropdown({
            input: '<input type="text" placeholder="Search">'
        })
    </script>
@endsection

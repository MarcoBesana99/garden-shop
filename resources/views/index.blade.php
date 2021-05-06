@extends('layouts.base')
@section('content')
   <div>{{ __('Documentation') }}</div> 
   @foreach ($products as $product)
   {{ $product->name }}
   {{ $product->description }}
   @endforeach
   
@endsection
@extends('layouts.base')
@section('content')
   <div>{{ __('Documentation') }}</div> 
   {{ $product->name }}
@endsection
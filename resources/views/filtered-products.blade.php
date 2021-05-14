@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('content')
@foreach ($products as $product)
    {{ $product->name }}
@endforeach
@endsection
@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('content')
{{ $product->name }}
@endsection
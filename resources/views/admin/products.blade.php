@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('English Name') }}</th>
                                    <th>{{ __('Russian Name') }}</th>
                                    <th>{{ __('English Category') }}</th>                                    
                                    <th>{{ __('Russian Category') }}</th>                                    
                                    <th>{{ __('Info') }}</th>
                                    <th>{{ __('Edit') }}</th>
                                    <th>{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->translate('en')->name }}</td>
                                        <td>{{ $product->translate('ru')->name }}</td>
                                        <td>{{ $product->category->translate('en')->name }}</td>
                                        <td>{{ $product->category->translate('ru')->name }}</td>
                                        <td><a href="{{ route('admin.products.show', $product) }}"><i
                                            class="fas fa-share-square btn edit-btn"></i></a></td>
                                        <td><a href="{{ route('admin.products.edit', $product) }}"><i
                                                    class="fas fa-edit btn edit-btn"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.products.destroy', $product) }}"
                                                method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn far fa-trash-alt delete-button"
                                                    onclick="return confirm('Are you sure to delete the category?')"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
          $('.alert').fadeOut(4500)
        })
    </script>
@endsection

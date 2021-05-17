@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header d-flex">
                    <div class="mr-auto">{{ __('Descriptions') }}</div>
                    <a href="{{ route('admin.descriptions.create', $productId) }}" class="d-flex">
                        <button type="submit" class="btn btn-primary ml-3">Add Description</button>
                    </a>
                </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('English Title') }}</th>
                                    <th>{{ __('Russian Title') }}</th>
                                    <th>{{ __('Info') }}</th>
                                    <th>{{ __('Edit') }}</th>
                                    <th>{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descriptions as $description)
                                    <tr>
                                        <td>{{ $description->translate('en')->title }}</td>
                                        <td>{{ $description->translate('ru')->title }}</td>
                                        <td><a href="{{ route('admin.descriptions.show', [$productId, $description]) }}"><i
                                            class="fas fa-share-square btn edit-btn"></i></a></td>
                                        <td><a href="{{ route('admin.descriptions.edit', [$productId, $description]) }}"><i
                                                    class="fas fa-edit btn edit-btn"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.descriptions.destroy', [$productId, $description->id]) }}"
                                                method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn far fa-trash-alt delete-button"
                                                    onclick="return confirm('Are you sure to delete the description?')"></button>
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

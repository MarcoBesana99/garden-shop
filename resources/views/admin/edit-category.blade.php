@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit category') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                              {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="enCategoryName">{{ __('English Name') }}</label>
                                <input type="text" class="form-control" value="{{ $category->translate('en')->name }}" name="name:en" id="enCategoryName" />
                            </div>
                            <div class="form-group">
                                <label for="ruCategoryName">{{ __('Russian Name') }}</label>
                                <input type="text" class="form-control" value="{{ $category->translate('ru')->name }}" name="name:ru" id="ruCategoryName" />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 btn-block">{{ __('Edit') }}</button>
                        </form>
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
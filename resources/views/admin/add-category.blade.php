@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add a category') }}</div>
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
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="enCategoryName">English Name</label>
                                <input type="text" class="form-control" value="{{ old('name:en') }}" name="name:en" id="enCategoryName" />
                            </div>
                            <div class="form-group">
                                <label for="ruCategoryName">Russian Name</label>
                                <input type="text" class="form-control" value="{{ old('name:ru') }}" name="name:ru" id="ruCategoryName" />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 btn-block">Add</button>
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
          $('.alert').fadeOut('slow')
        })
    </script>
@endsection
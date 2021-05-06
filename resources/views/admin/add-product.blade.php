@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add a product') }}</div>

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
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="enProductName">English Name</label>
                                <input type="text" class="form-control" value="{{ old('name:en') }}" name="name:en" id="enProductName" />
                            </div>
                            <div class="form-group">
                                <label for="enProductDesc">English Description</label>
                                <textarea type="text" class="form-control" value="{{ old('description:en') }}" name="description:en" id="enProductDesc"
                                    rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruProductName">Russian Name</label>
                                <input type="text" class="form-control" value="{{ old('name:ru') }}" name="name:ru" id="ruProductName" />
                            </div>
                            <div class="form-group">
                                <label for="ruProductDesc">Russian Description</label>
                                <textarea type="text" class="form-control" value="{{ old('description:ru') }}" name="description:ru" id="ruProductDesc"
                                    rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Add Images</label>
                                <div class="input-images"></div>
                            </div>
                            <select class="form-control" name="category">
                                <option>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->translate('en')->name }}</option>
                                @endforeach
                            </select>
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
            $('.input-images').imageUploader();
        });

    </script>
@endsection

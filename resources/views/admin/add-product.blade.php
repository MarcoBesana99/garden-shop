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
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="enProductName">English Name</label>
                                <input type="text" class="form-control" value="{{ old('name:en') }}" name="name:en"
                                    id="enProductName" />
                            </div>
                            <div class="form-group">
                                <label for="ruProductName">Russian Name</label>
                                <input type="text" class="form-control" value="{{ old('name:ru') }}" name="name:ru"
                                    id="ruProductName" />
                            </div>
                            <div class="form-group">
                                <label for="enSizes">{{ __('English Sizes') }}</label>
                                <textarea class="form-control" name="sizes:en" id="enSizes"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruSizes">{{ __('Russian Sizes') }}</label>
                                <textarea class="form-control" name="sizes:ru" id="ruSizes"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="enFeatures">{{ __('English Features') }}</label>
                                <textarea class="form-control" name="features:en" id="enFeatures"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruFeatures">{{ __('Russian Features') }}</label>
                                <textarea class="form-control" name="features:ru" id="ruFeatures"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Add Images</label>
                                <input type="file" name="images[]" multiple>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.alert').fadeOut(4500)
            ClassicEditor
                .create( document.querySelector( '#enSizes' ), {toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]} )
                .catch( error => {
                    console.error( error );
                });
            ClassicEditor
                .create( document.querySelector( '#ruSizes' ) , {toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]})
                .catch( error => {
                    console.error( error );
                });
            ClassicEditor
                .create( document.querySelector( '#ruFeatures' ), {toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]} )
                .catch( error => {
                    console.error( error );
                });
            ClassicEditor
                .create( document.querySelector( '#enFeatures' ), {toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]} )
                .catch( error => {
                    console.error( error );
                });
        });

    </script>
@endsection

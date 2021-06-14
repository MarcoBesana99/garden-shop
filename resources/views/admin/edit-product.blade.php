@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.products.index') }}"><i class="far fa-arrow-alt-circle-left mr-3" style="color: gray; font-size: 20px"></i></a>
                        {{ __('Edit product') }}</div>

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
                        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="enProductName">{{ __('English Name') }}</label>
                                <input type="text" class="form-control" value="{{ $product->translate('en')->name }}" name="name:en" id="enProductName" />
                            </div>
                            <div class="form-group">
                                <label for="ruProductName">{{ __('Russian Name') }}</label>
                                <input type="text" class="form-control" value="{{ $product->translate('ru')->name }}" name="name:ru" id="ruProductName" />
                            </div>
                            <div class="form-group">
                                <label for="enSizes">{{ __('English Sizes') }}</label>
                                <textarea class="form-control" name="sizes:en" id="enSizes">{{ $product->translate('en')->sizes }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruSizes">{{ __('Russian Sizes') }}</label>
                                <textarea class="form-control" name="sizes:ru" id="ruSizes">{{ $product->translate('ru')->sizes }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="enFeatures">{{ __('English Features') }}</label>
                                <textarea class="form-control" name="features:en" id="enFeatures">{{ $product->translate('en')->features }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruFeatures">{{ __('Russian Features') }}</label>
                                <textarea class="form-control" name="features:ru" id="ruFeatures">{{ $product->translate('ru')->features }}</textarea>
                            </div>
                            <div class="row form-group">
                              <div class="col-12"><label>{{ __('Preview of Images') }}</label></div>
                              @foreach (json_decode($product->images_path) as $image)
                                  <div class="col-md-4 mt-3">
                                      <img class="mw-100" src="{{ asset('img/' . $image) }}"
                                          alt="{{ $product->translate('en')->name }}">
                                  </div>
                              @endforeach
                          </div>
                            <div class="form-group">
                                <label>{{ __('If you want to modify the images, add here the new ones') }}</label>
                                <div class="input-images"></div>
                            </div>
                            <select class="form-control" name="category">
                                <option>{{ __('Select a category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->translate('en')->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-3 btn-block">{{ __('Edit') }}</button>
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
            $('.input-images').imageUploader({
                extensions: ['.jpg', '.jpeg', '.png', '.svg', '.JPG', '.JPEG', '.PNG', '.SVG']
                })
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

@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit product') }}</div>

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
                                <label for="enProductDesc">{{ __('English Description') }}</label>
                                <textarea type="text" class="form-control" name="description:en" id="enProductDesc"
                                    rows="4">{{ $product->translate('en')->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruProductName">{{ __('Russian Name') }}</label>
                                <input type="text" class="form-control" value="{{ $product->translate('ru')->name }}" name="name:ru" id="ruProductName" />
                            </div>
                            <div class="form-group">
                                <label for="ruProductDesc">{{ __('Russian Description') }}</label>
                                <textarea type="text" class="form-control" name="description:ru" id="ruProductDesc"
                                    rows="4">{{ $product->translate('ru')->description }}</textarea>
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
    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader()
            $('.alert').fadeOut(4500)
        });
    </script>
@endsection

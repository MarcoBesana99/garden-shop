@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.descriptions.index', $productId) }}"><i class="far fa-arrow-alt-circle-left mr-3"
                            style="color: gray; font-size: 20px"></i></a>
                        {{ __('Edit description') }}</div>

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
                        <form action="{{ route('admin.descriptions.update', [$productId, $description]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="enuDescTitle">{{ __('English Title') }}</label>
                                <input type="text" class="form-control" value="{{ $description->translate('en')->title }}"
                                    name="title:en" id="enDescTitle" />
                            </div>
                            <div class="form-group">
                                <label for="ruDescTitle">{{ __('Russian Title') }}</label>
                                <input type="text" class="form-control" value="{{ $description->translate('ru')->title }}"
                                    name="title:ru" id="ruDescTitle" />
                            </div>
                            <div class="form-group">
                                <label for="enDescContent">English Content*</label>
                                <textarea type="text" class="form-control" name="content:en" id="enDescContent"
                                    rows="4">{{ $description->translate('en')->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruDescContent">Russian Content*</label>
                                <textarea type="text" class="form-control" name="content:ru" id="ruDescContent"
                                    rows="4">{{ $description->translate('ru')->content }}</textarea>
                            </div>
                            @if ($description->images_path != null)
                                <div class="row form-group">
                                    <div class="col-12"><label>{{ __('Preview of Images') }}</label></div>
                                    @foreach (json_decode($description->images_path) as $image)
                                        <div class="col-md-4 mt-3">
                                            <img class="mw-100" src="{{ asset('img/descriptions/' . $image) }}"
                                                alt="{{ $description->translate('en')->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>{{ __('If you want to modify or add images, add here the new ones') }}</label>
                                <input type="file" name="images[]" multiple>
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
        });

    </script>
@endsection

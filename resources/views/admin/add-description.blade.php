@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add a description') }}</div>

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
                        <form action="{{ route('admin.descriptions.store', $productId) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="enDescTitle">English Title*</label>
                                <input type="text" class="form-control" value="{{ old('title:en') }}" name="title:en"
                                    id="enDescTitle" />
                            </div>
                            <div class="form-group">
                                <label for="ruDescTitle">Russian Title*</label>
                                <input type="text" class="form-control" value="{{ old('title:ru') }}" name="title:ru"
                                    id="ruDescTitle" />
                            </div>
                            <div class="form-group">
                                <label for="enDescContent">English Content*</label>
                                <textarea type="text" class="form-control" name="content:en" id="enDescContent"
                                    rows="4">{{ old('content:en') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ruDescContent">Russian Content*</label>
                                <textarea type="text" class="form-control" name="content:ru" id="ruDescContent"
                                    rows="4">{{ old('content:en') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Add Images</label>
                                <input type="file" name="images[]" multiple>
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
            $('.alert').fadeOut(4500)
        });

    </script>
@endsection

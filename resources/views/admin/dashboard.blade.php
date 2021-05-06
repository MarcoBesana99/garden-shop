@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name:en" />
                            <input type="text" name="description:en" />
                            <input type="text" name="name:ru" />
                            <input type="text" name="description:ru" />
                            <input type="text" name="images_path" />

                            <div class="input-images"></div>

                            <button type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $( document ).ready(function(){
  
    $('.input-images').imageUploader();
  
  });
</script>
@endsection
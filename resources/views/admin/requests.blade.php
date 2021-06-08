@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="mr-auto">{{ __('Requests') }}</div>
                        <form action="{{ route('admin.requests.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ml-3">Search</button>
                        </form>
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
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Company') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Info') }}</th>
                                    <th>{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientRequests as $clientRequest)
                                    <tr>
                                        <td>{{ $clientRequest->email }}</td>
                                        <td>{{ $clientRequest->first_name . ' ' . $clientRequest->last_name }}</td>
                                        <td>{{ $clientRequest->company }}</td>
                                        <td>{{ $clientRequest->phone }}</td>
                                        <td>
                                            <form action="{{ route('admin.requests.update', $clientRequest) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group d-flex justify-content-center mt-3">
                                                    <select name="status" onchange="this.form.submit()">
                                                        <option value="new"
                                                            {{ $clientRequest->status == 'new' ? 'selected' : '' }}>
                                                            {{ __('New') }}</option>
                                                        <option value="pending"
                                                            {{ $clientRequest->status == 'pending' ? 'selected' : '' }}>
                                                            {{ __('Pending') }}</option>
                                                        <option value="closed"
                                                            {{ $clientRequest->status == 'closed' ? 'selected' : '' }}>
                                                            {{ __('Closed') }}</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $clientRequest->created_at->format('d/m/Y') }}</td>
                                        <td><a href="{{ route('admin.requests.show', $clientRequest) }}"><i
                                                    class="fas fa-share-square btn edit-btn"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.requests.destroy', $clientRequest) }}"
                                                method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn far fa-trash-alt delete-button"
                                                    onclick="return confirm('Are you sure to delete the request?')"></button>
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

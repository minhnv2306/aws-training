@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    @foreach($files as $file)
                        <img src="{{ Storage::url($file) }}" class="img-thumbnail" alt="Cinque Terre" width="220" height="200">
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a class="btn btn-primary" href="/upload-file"> Upload new image </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

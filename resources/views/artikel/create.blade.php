@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Artikel
                    <a href="{{ route('artikel.index') }}" class="badge btn-primary mb-3 float-end">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <form action="{{ route('artikel.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control @error('title') is-invalid                                
                            @enderror" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Post</label>
                            <select name="post_id" class="form-control @error('post_id') is-invalid                                
                            @enderror">
                                <option value="">pilih post</option>
                                @foreach ($post as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('post_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
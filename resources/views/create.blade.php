@extends('layout')
@section('title', 'Home')

@section('content')
<h1>Create a New Blog Post test git</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label>Title</label>
    <input class="@error('title') error-border @enderror" type="text" name="title" value="{{ old('title') }}">
    @error('title')
    <div class="error">
        {{ $message }}
    </div>
    @enderror
    <label>Description</label>
    <textarea class="@error('description') error-border @enderror" name="description"
        rows="10">{{ old('description') }}</textarea>
    @error('description')
    <div class="error">
        {{ $message }}
    </div>
    @enderror
    <button type="submit">Submit</button>
</form>
@endsection

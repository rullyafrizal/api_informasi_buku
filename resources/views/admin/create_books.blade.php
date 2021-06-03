@extends('admin.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            Add New Book
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('storeBooks') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="page">Page</label>
                    <input type="number" class="form-control" name="page" id="page" required>
                </div>
                <div class="form-group">
                    <label for="">Book's Author</label> <br>
                    @foreach($authors as $author)
                    <label class="checkbox-inline mx-3">
                        <input type="checkbox" name="author[]" value="{{$author->name}}">
                        {{$author->name}}
                    </label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release_date" required>
                </div>
                <div class="form-group">
                    <label for="cover">Book's Cover </label> <br>
                    <input type="file" name="cover" id="cover">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection

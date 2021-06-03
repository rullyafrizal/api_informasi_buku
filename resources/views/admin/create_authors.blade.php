@extends('admin.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            Add New Book
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('author') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Authors Name</label>
                    <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection

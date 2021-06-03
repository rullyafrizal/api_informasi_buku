@extends('admin.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            <div class="card-header py-3 justify-content-between">
                <b>Book Detail</b>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td width="20%"><strong>Book ID</strong></td>
                    <td width="80%">{{ $book->id }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Title</strong></td>
                    <td width="80%"> {{ $book->title }} </td>
                </tr>
                <tr>
                    <td width="20%"><strong>Cover</strong></td>
                    <td width="80%"> <img src="{{$cover}}" alt="" width="200px"></td>
                </tr>
                <tr>
                    <td width="20%"><strong>Content</strong></td>
                    <td width="80%"> {{ $book->content }} </td>
                </tr>
                <tr>
                    <td width="20%"><strong>Page</strong></td>
                    <td width="80%"> {{ $book->page }} </td>
                </tr>
                <tr>
                    <td width="20%"><strong>Release Date</strong></td>
                    <td width="80%"> {{ $book->release_date }} </td>
                </tr>
                <tr>
                    <td width="20%"><strong>Authors</strong></td>
                    <td width="80%">
                        <ul>
                            @forelse($authors as $author)
                                <li>{{$author->name}}</li>
                            @empty
                            No Data
                            @endforelse
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

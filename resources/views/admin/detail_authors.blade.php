@extends('admin.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            <div class="card-header py-3 justify-content-between">
                Authors Detail
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td width="20%"><strong>Author ID</strong></td>
                    <td width="80%">{{ $author->id }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Name</strong></td>
                    <td width="80%"> {{ $author->name }} </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

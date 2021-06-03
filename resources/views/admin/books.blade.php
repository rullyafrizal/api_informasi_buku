@extends('admin.index')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Books</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            <div class="row justify-content-between">
                <div class="col">
                    <a href="{{ route('createBook') }}" class= "btn btn-primary"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                   cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                   style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 25px;">
                                        No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 223px;">Title
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 101px;">Pages
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 43px;">Release Date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 43px;">Action
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">Title</th>
                                    <th rowspan="1" colspan="1">Pages</th>
                                    <th rowspan="1" colspan="1">Release Date</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @forelse($books as $key => $book)
                                <tr class="odd">
                                    <td class="sorting_1">{{ ++$key }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->page }}</td>
                                    <td>{{ $book->release_date }}</td>
                                    <td>
                                        <a href="/detail-book/{{ $book->id }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        <a href="/books/{{ $book->id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="/delete-book/{{ $book->id }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger my-2"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <h3>No Data</h3>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.master')

@section('title', 'Post')

@section('content')

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete-post/') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight: bold;" id="exampleModalLabel">Delete </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="post_delete_id" id="category_id">
                        <h5>Are you sure you want to delete this ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>
                    View Posts
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (session('message_delete'))
                    <div class="alert alert-danger">{{ session('message_delete') }}</div>
                @endif

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! Str::limit($item->description, 400) !!}</td>
                                    <td>{{ $item->status == '1' ? 'Show' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit-post/' . $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deleteCategoryBtn"
                                            value="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

<!-- JQuery to delete Category record -->
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteCategoryBtn', function(e) {
                e.preventDefault();

                var category_id = $(this).val();
                $('#category_id').val(category_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection

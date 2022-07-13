@extends('layouts.master')

@section('title', 'Category')

@section('content')

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/delete-category/') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold;" id="exampleModalLabel">Delete Category with its Posts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                    <h5>Are you sure you want to delete this category?</h5>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid px-4">
    <div class="card mt-4">
        <!-- card header -->
        <div class="card-header">
            <h4>
                View Categories
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>
        <!-- card body -->
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Navbar Status</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{!! $item->description !!}</td>
                            <!-- <td>{{ $item->image }}</td> -->
                            <td>
                                <img src="{{ asset('uploads/category/'.$item->image) }}" width="50px" height="50px" alt="Img">
                            </td>
                            <td>{{ $item->navbar_status == '1' ? 'Show' : 'Hidden' }}</td>
                            <td>{{ $item->status == '1' ? 'Show' : 'Hidden' }}</td>
                            <td>
                                <a href="{{ url('admin/edit-categroy/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <!-- <form action="{{ url('admin/delete-category/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form> -->
                                <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $item->id }}">Delete</button>
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
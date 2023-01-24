@extends('admin.panel')

@section('admin-info')
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus me-1"></i> Add item</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/add-item" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2">
                        @csrf
                        <input type="text" placeholder="Name" name="name" class="form-control">
                        <input type="number" placeholder="Price" name="price" class="form-control">
                        <input type="text" placeholder="Info" name="info" class="form-control">
                        <select name="category" id="" class="form-select">
                            <option selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="col-12 d-flex gap-2">
                            <input type="file" name="image" class="form-control">
                            <input type="file" name="images[]" multiple class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

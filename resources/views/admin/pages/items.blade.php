@extends('admin.panel')

@section('admin-info')
    <div class="col-12 d-flex gap-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal"><i class="fa-solid fa-plus me-1"></i> Add item</button>
        <!-- Modal -->
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
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
        <div>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 border-top mt-3 py-2">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Info</th>
                <th>Image</th>
                <th>Images</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="align-middle">
                        <th scope="row">{{ $item->id }}</th>
                        <th>{{ $item->name }}</th>
                        <th>{{ $item->price }}</th>
                        <th><p class="text-truncate" style="width: 200px;height: auto">{{ $item->info }}</p></th>
                        <th><img src="{{ asset('storage/images/' . $item->image) }}" style="width: 50px;height: 50px;object-fit: cover" alt=""></th>
                        <th>
                            @isset($item->images)
                                @foreach(json_decode($item->images) as $img)
                                    <img src="{{ asset('storage/images/' . $img) }}" style="width: 50px;height: 50px;object-fit: cover" alt="">
                                @endforeach
                            @endisset
                        </th>
                        <th>{{ $item->category->name }}</th>
                        <th class="text-center"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></th>
                        <th class="text-center"><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModal"><i class="fa-solid fa-trash"></i></button></th>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="fw-bold">
                                            Are you sure you want to delete this item ?
                                        </p>
                                    </div>
                                    <div class="modal-body d-flex gap-3">
                                        <div>
                                            <p class="mb-2">{{ $item->name }}</p>
                                            <img src="{{ asset('storage/images/' . $item->image) }}" class="img-thumbnail" style="width: 100px;height: auto" alt="">
                                        </div>
                                        <div>
                                            <div>
                                                <p>{{ $item->price }} դր.</p>
                                            </div>
                                            <div>
                                                <p>{{ $item->info }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/delete-item/{{ $item->id }}"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i> Delete</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12 d-flex justify-content-center">
        {{ $items->links() }}
    </div>
@endsection

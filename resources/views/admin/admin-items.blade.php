<div>
    <div class="col-12 shadow rounded-1 p-4">
        <div class="col-12">
            <button data-bs-toggle="modal" data-bs-target="#addItemModal" class="btn btn-success"><i class="fa-solid fa-plus me-1"></i> Add item</button>

            <!-- Modal -->
            <div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addItemModalLabel">Add item</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/add-item" enctype="multipart/form-data" method="post"  class="d-flex flex-wrap gap-3">
                                @csrf
                                <div class="col-12 d-flex gap-3">
                                    <input required type="text" name="name" placeholder="Name" class="form-control">
                                    <input required type="number" name="price" placeholder="Price" class="form-control">
                                </div>
                                <div class="col-12 d-flex">
                                    <input required type="text" name="info" placeholder="Info" class="form-control">
                                </div>
                                <div class="col-12 d-flex gap-3">
                                    <input required type="file" name="image" class="form-control">
                                    <input required type="file" name="images[]" multiple class="form-control">
                                </div>
                                <div class="col-12 d-flex gap-3">
                                    <select name="category" required class="form-select">
                                        <option selected hidden value="0">Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <table class="table text-center align-middle">
            <thead class="text-nowrap">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price AMD</th>
                <th scope="col">Info</th>
                <th scope="col">Image</th>
                <th scope="col">Images</th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td class="text-start">{{ $item->name }}</td>
                        <td><p class="fw-bold text-success">{{ $item->price }}</p></td>
                        <td>{{ Str::limit($item->info,30) }}</td>
                        <td><img src="{{ $item->image }}" style="width: 50px;height: auto" alt=""></td>
                        <td>
                            @foreach(json_decode($item->images) as $img)
                                <img src="{{ $img }}" style="width: 25px;height: auto" alt="">
                            @endforeach
                        </td>
                        <td><span class="badge bg-primary p-2"><i class="fa-solid fa-{{ $item->category->icon }}"></i> {{ ucfirst($item->category->name) }}</span></td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="/"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a></td>
                        <td><button data-bs-toggle="modal" data-bs-target="#deleteItemModal" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex gap-2">
                                            <div class="col d-flex justify-content-center align-items-center">
                                                <img src="{{ $item->image }}" class="img-thumbnail" style="width: 100px;height: auto" alt="">
                                            </div>
                                            <div class="col-7">
                                                <div class="col-12">
                                                    <p class="fw-bold text-success">{{ $item->price }} AMD</p>
                                                </div>
                                                <div class="col-12">
                                                    <p>{{ $item->info }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger" wire:click="deleteItem({{ $item->id }})" data-bs-dismiss="modal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
</div>

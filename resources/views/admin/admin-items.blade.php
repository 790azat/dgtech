<div>
    <div class="col-12 shadow rounded-1 p-4">
        <div class="col-12 d-flex gap-3 align-items-start">
            <button data-bs-toggle="modal" data-bs-target="#addItemModal" class="btn btn-success"><i class="fa-solid fa-plus me-1"></i> Add item</button>
            <!-- Modal -->
            <div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Add item</h1>
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
            <div class="col-auto">
                <input type="text" wire:model="search" class="form-control" placeholder="Search">
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
                        <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#itemEditModal{{ $item->id }}"><i class="fa-solid fa-pen"></i></button></td>
                        <div class="modal fade" id="itemEditModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Add item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/edit-item" enctype="multipart/form-data" method="post"  class="d-flex flex-wrap">
                                            @csrf
                                            <input class="d-none" name="id" type="text" value="{{ $item->id }}">
                                            <div class="col-12 d-flex gap-3 mb-3">
                                                <input required type="text" value="{{ $item->name }}" name="name" placeholder="Name" class="form-control">
                                                <input required type="number" value="{{ $item->price }}" name="price" placeholder="Price" class="form-control">
                                            </div>
                                            <div class="col-12 d-flex mb-3">
                                                <input required type="text" value="{{ $item->info }}" name="info" placeholder="Info" class="form-control">
                                            </div>
                                            <div class="col-12 d-flex gap-3 mb-3">
                                                @if($item->image == null)
                                                    <input type="file" name="image" class="form-control d-none" id="image">
                                                    <button type="button" onclick="document.getElementById('image').click()" class="btn btn-primary text-nowrap"><i class="fa-solid fa-upload me-1"></i> <i class="fa-solid fa-image me-1"></i> Upload main</button>
                                                @endif
                                                @if(json_decode($item->images) == [])
                                                    <input type="file" name="images[]" multiple class="form-control d-none" id="images">
                                                        <button type="button" onclick="document.getElementById('images').click()" class="btn btn-primary text-nowrap"><i class="fa-solid fa-upload me-1"></i> <i class="fa-solid fa-images me-1"></i> Upload images</button>
                                                @endif
                                            </div>
                                            <div class="col-12 d-flex gap-3 mb-3">
                                                <div class="col-auto">
                                                    @isset($item->image)
                                                        <img src="{{ $item->image }}" class="img-thumbnail" style="width: 100px;height: auto;border-bottom-left-radius: 0;border-bottom-right-radius: 0" alt="">
                                                        <div class="col-12">
                                                            <button type="button" wire:click="deleteImage({{$item->id}})" class="col-12 btn btn-danger py-0" style="border-top-left-radius: 0;border-top-right-radius: 0"><i class="fa-solid fa-trash"></i></button>
                                                        </div>
                                                    @endisset
                                                </div>
                                                <div class="col-auto">
                                                    <div class="col-12 d-flex gap-3">
                                                        @foreach(json_decode($item->images) as $img)
                                                            <div class="col">
                                                                <img src="{{ $img }}" class="img-thumbnail" style="width: 100px;height: auto;border-bottom-left-radius: 0;border-bottom-right-radius: 0" alt="">
                                                                <div class="col-12">
                                                                    <button type="button" wire:click="deleteFromImages({{$item->id}},'{{$img}}')" class="col-12 btn btn-danger py-0" style="border-top-left-radius: 0;border-top-right-radius: 0"><i class="fa-solid fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-12 d-flex gap-3 mb-3">
                                                <select name="category" required class="form-select">
                                                    <option hidden value="0">Category</option>
                                                    @foreach($categories as $category)
                                                        <option @if($category->id == $item->category_id) selected @endif value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
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

                        <td><button data-bs-toggle="modal" data-bs-target="#deleteItemModal" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">{{ $item->name }}</h1>
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
            @isset($items->links)
                {{ $items->links() }}
            @endisset
        </div>
    </div>
</div>

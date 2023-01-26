<div>
    <div class="col-12 shadow rounded-1 p-4">
        <table class="table text-center align-middle">
            <thead class="text-nowrap">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Icon</th>
                <th scope="col">Items count</th>
                <th scope="col">Created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ ucfirst($category->name) }}</td>
                    <td><i class="fa-solid fa-{{ $category->icon }}"></i></td>
                    <td><span class="badge bg-success p-2">{{ count($category->items) }}</span></td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="/"><button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a></td>
                    <td><button data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">{{ ucfirst($category->name) }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                @if(count($category->items) > 0)
                                    <div class="modal-body d-flex gap-2">
                                        <p>This category has {{ count($category->items) }} items</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                @else
                                    <div class="modal-body d-flex gap-2">
                                        <p>Are you sure you want to delete this category?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" wire:click="deleteCategory({{ $category->id }})" data-bs-dismiss="modal">Delete</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

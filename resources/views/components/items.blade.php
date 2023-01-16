<div class="col-12" id="items">
    <div class="container px-0 d-flex">
        <div class="col-3 px-3 py-4 shadow">
            <div class="col-12 fw-bold text-center fs-5 border-bottom py-2 pb-1">
                <div>
                    <p><i class="fa-solid fa-sitemap me-1"></i> Category</p>
                </div>
                <div class="col-12 py-2">
                    @foreach($categories as $category)
                        <button class="btn btn-outline-secondary col-12 mb-1"><i class="fa-solid fa-{{ $category->icon }} me-1"></i> {{ ucfirst($category->name) }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-12 fw-bold text-center fs-5 py-2 pb-1">
                <p class="me-2 text-nowrap"><i class="fa-solid fa-sort me-1"></i> Sorting</p>
            </div>
            <div class="col-12 d-flex align-items-center fw-bold text-center fs-5 border-bottom py-2">
                <select class="form-select" aria-label="Default select example">
                    <option value="1" selected>Price: Low to High</option>
                    <option value="2">Price: High to Low</option>
                </select>
            </div>
            <div class="col-12 border-bottom py-2">
                <div class="fw-bold text-center fs-5">
                    <p><i class="fa-solid fa-filter me-1"></i> Filter</p>
                </div>
                <div class="mt-2">
                    <div class="col-12 d-flex justify-content-center gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Free sipping
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Actual
                            </label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Free sipping
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Actual
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 d-flex row-cols-3 flex-wrap">
            @foreach($items as $item)
                <div class="col ps-3 @if($loop->index == count($items) - 3 or $loop->index == count($items) - 3 or $loop->last) @else pb-3 @endif">
                    <div class="col-12 shadow rounded-1 p-2">
                        <a href="" class="col-12">
                            <img src="{{ asset('images/' . $item->image) }}" class="rounded-1" style="width: 100%;height: auto;object-fit: cover" alt="">
                        </a>
                        <div class="col-12 p-3 pb-0">
                            <div class="col-12 text-center text-truncate">
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                        <div class="col-12 p-3 py-1">
                            <div class="col-12 text-center text-success text-nowrap fw-bold d-flex gap-3 justify-content-center">
                                <p>{{ $item->price }} դր.</p>
                                <p>{{ $item->price / 400 }} $</p>
                            </div>
                        </div>
                        <div class="col-12 p-3 pt-1">
                            <button class="btn btn-outline-success col-12">Add to cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container d-flex justify-content-center px-0 d-flex py-4 mt-3">
        {{ $items->links() }}
    </div>
</div>

<button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#create">
    Yaratish
</button>

<!-- Create Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Yaratish</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" placeholder="Nomi" required>
                    <input class="form-control border-4 m-2" name="description" placeholder="Malumot"
                           required>
                    <input class="form-control border-4 m-2" name="price" placeholder="Narxi" required>

                    <select id="category" class="form-control border-4 m-2" name="category_id"
                            onchange="loadSubcategories()">
                        <option value="">Kategoriya tanlang</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <!-- Subcategory Select (Initially hidden) -->
                    <div id="subcategory-container" style="display: none; margin-top: 15px;">
                        <select id="subcategory" class="form-control border-4 m-2" name="subcategory_id">
                            <!-- Subcategories will be dynamically added here -->
                        </select>
                    </div>

                    <input type="file" class="form-control border-4 m-2" name="photo">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">yopish</button>
                    <button type="submit" class="btn btn-primary">saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button type="button" class="btn btn-outline-warning ml-4" data-bs-toggle="modal"
        data-bs-target="#productedit{{$Product->id}}">
    O`zgartirish
</button>

<!-- Edit Modal for Product -->
<div class="modal fade" id="productedit{{$Product->id}}" tabindex="-1"
     aria-labelledby="exampleModalLabel{{$Product->id}}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel{{$Product->id}}">Ozgartirish</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.update', $Product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" value="{{$Product->name}}"
                           placeholder="nomi" required>
                    <input class="form-control border-4 m-2" name="description" value="{{$Product->description}}"
                           placeholder="malumot" required>
                    <input class="form-control border-4 m-2" name="price" value="{{$Product->price}}"
                           placeholder="narxi" required>
                    <select id="category{{$Product->id}}" class="form-control border-4 m-2" name="category_id"
                            onchange="loadSubcategories({{ $Product->id }})">

                        <option value="">Kategoriya tanlash</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $Product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Subcategory Select (Initially hidden) -->
                    <div id="subcategory-container{{$Product->id}}" style="display: none; margin-top: 15px;">
                        <select id="subcategory{{$Product->id}}" class="form-control border-4 m-2" name="subcategory_id">
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

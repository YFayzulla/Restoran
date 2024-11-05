<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}">
    Edit
</button>

<div class="modal fade" id="edit{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" value="{{$category->name}}"
                           placeholder="Enter category name" required>
                    <div>
                        <label class="text-black d-flex align-items-center">
                            <input type="checkbox" id="showCategoryInputEdit{{$category->id}}" name="status"
                                   class="form-checkbox m-2 text-black"
                                   onclick="toggleInput('showCategoryInputEdit{{$category->id}}', 'categoryInputEdit{{$category->id}}')"
                                {{ $category->sub_category ? 'checked' : '' }}>Kategoriyaga biriktirish
                        </label>
                    </div>

                    <select id="categoryInputEdit{{$category->id}}" class="form-control border-4 m-2"
                            name="sub_category" style="{{ $category->sub_category ? '' : 'display:none;' }}">
                        @foreach($categories as $item)
                            {!! $item->sub_category === null&& $item->id !== $category->id ? "<option value='$item->id'>{$item->name}</option>" : '' !!}
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

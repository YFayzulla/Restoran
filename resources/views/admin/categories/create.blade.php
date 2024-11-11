<button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#create">
    Kategoriya yaratish
</button>

<!-- Create Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Kategoriya yaratish</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" placeholder="Kategoriya nomi" required>
                    <div>
                        <label class="text-black d-flex align-items-center">
                            <input type="checkbox" id="showCategoryInputCreate" name="status"
                                   class="form-checkbox m-2 text-black"
                                   onclick="toggleInput('showCategoryInputCreate', 'categoryInputCreate')">
                            Kategoriyaga biriktirish

                        </label>
                    </div>

                    <select id="categoryInputCreate" class="form-control border-4 m-2" name="sub_category"
                            style="display:none;">
                        @foreach($categories as $item)
                            {!! $item->sub_category === null ? "<option value='$item->id'>{$item->name}</option>" : '' !!}
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">yopish</button>
                    <button type="submit" class="btn btn-primary">saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>

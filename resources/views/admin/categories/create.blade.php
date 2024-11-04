<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
    Launch demo modal
</button>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" placeholder="Enter category name" required>

                    <div>
                        <label class="text-black">
                            <input type="checkbox" id="showCategoryInput" class="form-checkbox m-2 text-black"
                                   onclick="toggleInput(this.checked)"> Kategoriyaga biriktirish
                        </label>
                    </div>

                    <select id="categoryInput" class="form-control border-4 m-2" name="sub_category" required
                            style="display:none;">
                        @foreach($categories as $item)

                            {!! $item->sub_category === null ? "<option value='$item->id'>{$item->name}</option>" : '' !!}

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

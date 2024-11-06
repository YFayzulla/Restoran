<button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#create">
    Create
</button>

<!-- Create Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Create Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" placeholder="Mahsulot nomi" required>
                    <input class="form-control border-4 m-2" name="description" placeholder="Qoshimcha malumot" required>
                    <input class="form-control border-4 m-2" name="price" placeholder="Narxi" required>

                    <select name="category_id" id="" class="form-control m-2 border-4">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <input type="file" class="form-control border-4 m-2" name="photo" >
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

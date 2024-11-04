<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}"> edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('categories.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input class="form-control border-4" name="name" value="{{$category->name}}" placeholder="Enter category name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button  class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

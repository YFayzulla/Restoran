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
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" placeholder="Kategoriya nomi" required>
                    <input class="form-control border-4 m-2" name="phone" placeholder="Tel raqami" required>
                    <input class="form-control border-4 m-2" name="salary" placeholder="Ish haqqi" required>
{{--                    <input type="hidden" class="form-control border-4 m-2" name="password" value="" placeholder="Ish haqqi" required>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
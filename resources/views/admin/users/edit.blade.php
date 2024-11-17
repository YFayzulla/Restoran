<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">
    O'zgartirish
</button>

<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-dark" id="exampleModalLabel">Ishchi malumotlarini ozgartirish</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input class="form-control border-4 m-2" name="name" value="{{$user->name}}"
                           placeholder="ismi" required>

                    <input class="form-control border-4 m-2" name="phone" value="{{$user->phone}}"
                           placeholder="tel raqam" required>

                    @error('phone')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <input class="form-control border-4 m-2" name="salary" value="{{$user->salary}}"
                           placeholder="maosh" required>

                    <input class="form-control border-4 m-2" name="password"
                           placeholder="parol" >


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">yopish</button>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>

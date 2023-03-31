<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <center>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <h2>{{$error}}</h2>
        @endforeach
    @endif
    </center>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-60 lg:px-80">
            <div class="bg-white overflow-hidden shadow -sm sm:rounded-lg">

                <div class="p-6 text-gray-900 m-3 p-3" >
                    <center>
                        <h1>kategoriyani o`zgartirish</h1>
                    </center>
                    <div class="card m-2 p-3 ">
                        <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data"><br>
                            @csrf
                            @method('PUT')
                            <input class="form-control m-3" type="text" value="{{$category->name_uz}}" name="name_uz">
                            <input class="form-control m-3" type="text" value="{{$category->name_ru}}" name="name_ru">
                            <input class="form-control m-3" type="text" value="{{$category->name_en}}" name="name_en">
                            <input class="form-control m-3" type="number" value="{{$category->parent_id}}" name="parent_id">
                            <input class="form-control m-3" type="file" value="{{$category->image}}" name="thumbnail">
                            <button type="submit" class="btn btn-success text-black-50 ">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

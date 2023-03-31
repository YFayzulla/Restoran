<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-60 lg:px-80">
            <div class="bg-white overflow-hidden shadow -sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-3 p-3" >
                    <center><h1>ovqat yaratish</h1></center>
                    <form action="{{route('dishes.update',$dishes->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input class="form-control m-3" type="text" value="{{$dishes->name_uz}}" name="name_uz">
                        <input class="form-control m-3" type="text" value="{{$dishes->name_ru}}" name="name_ru">
                        <input class="form-control m-3" type="text" value="{{$dishes->name_en}}" name="name_en">
                        <input class="form-control m-3" type="text" value="{{$dishes->desc_uz}}" name="desc_uz">
                        <input class="form-control m-3" type="text" value="{{$dishes->desc_ru}}" name="desc_ru">
                        <input class="form-control m-3" type="text" value="{{$dishes->desc_en}}" name="desc_en">
                        <select class='form-control m-3' name="category_id">
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}">{{$category->name_uz}}</option>
                            @endforeach
                        </select>
                        <input class="form-control m-3"  type="file" placeholder="thumbnail" name="thumbnail">
                        <button type="submit" class="btn btn-success text-black-50 " style="float:right"> save </button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

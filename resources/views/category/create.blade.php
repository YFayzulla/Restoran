<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-60 lg:px-80">
            <div class="bg-white overflow-hidden shadow -sm sm:rounded-lg">

                <div class="p-6 text-gray-900 m-3 p-3" >
<center>                    <h1>kategoriya yaratish</h1>
</center>
                    <form action="{{route('categories.store')}}" method="post"enctype="multipart/form-data">
                        @csrf
                    <input class="form-control m-3" type="text" placeholder="uzbekch nomi" name="name_uz">
                    <input class="form-control m-3" type="text" placeholder="ruscha nomi" name="name_ru">
                    <input class="form-control m-3" type="text" placeholder="inglischa nomi" name="name_en">
                    <input class="form-control m-3" type="number" placeholder="parent_id" name="parent_id">
                    <input class="form-control m-3" type="file" placeholder="image" name="image">
                    <button type="submit" class="btn btn-success text-black-50 "> save </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <a href="{{route('categories.index')}}" class="btn btn-success">Kategoriyalar</a>
        <a href="{{route('dishes.index')}}" class="btn btn-success">Ovqatlar</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="" class="btn btn-success m-2">Yangi</a>
                    <table class="table table-hover">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>category</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                        @foreach($dishes as $dish)
                            <tr>
                                <td>{{$dish->id}}</td>
                                <td>{{$dish->name_uz}}</td>
                                <td>{{$dish->category->name_uz}}</td>
                                <td>{{$dish->image}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

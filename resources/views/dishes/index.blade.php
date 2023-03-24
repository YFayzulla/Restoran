<x-app-layout>
    <x-slot name="header">
        <a href="{{route('categories.index')}}" class="btn btn-success">Kategoriyalar</a>
        <a href="{{route('dishes.index')}}" class="btn btn-success">Ovqatlar</a>

    </x-slot>
    @push('css')
        <link rel="stylesheet"
              href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script
            src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="" class="btn btn-success m-2">Yangi</a>
                    <table class="display"  id="table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>category</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dishes as $dish)
                            <tr>
                                <td>{{$dish->id}}</td>
                                <td>{{$dish->name_uz}}</td>
                                <td>{{$dish->category->name_uz}}</td>
                                <td>{{$dish->image}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

             </div>
    </div>
    @push('scripts')
        <script>
            let table = new DataTable('#table');
        </script>
    @endpush
</x-app-layout>

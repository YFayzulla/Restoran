<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white header-custom leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-input-alert_success></x-input-alert_success>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.categories.create')
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nomi</th>
                                <th class="text-center">Sub kategoriyasi</th>
                                <th class="text-center">Harakatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <th></th>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{$category->id}}</td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">
                                        {{ $category->subCategory->name ?? '' }}
                                    </td>
                                    <td class="text-center">

                                        <div class="d-flex">
                                            @include('admin.categories.edit')
                                            <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger ml-1"> trash</button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // Function to show/hide category input
    function toggleInput(isChecked) {
        const categoryInput = document.getElementById('categoryInput');
        categoryInput.style.display = isChecked ? 'block' : 'none';
    }

    // Reset the checkbox when the modal is shown
    var modal = document.getElementById('create');
    modal.addEventListener('shown.bs.modal', function () {
        document.getElementById('showCategoryInput').checked = false;
        toggleInput(false); // Ensure the category input is hidden initially
    });
</script>

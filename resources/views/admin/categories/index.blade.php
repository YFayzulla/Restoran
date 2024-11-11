<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white header-custom leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-input-alert_success></x-input-alert_success>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.categories.create')
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Kategoriyasi</th>
                                <th class="text-center">Harakatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="text-center">
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td class="text-center">{{ $category->name }}</td>

                                    <!-- Display the main category if this category is a subcategory -->
                                    <td class="text-center">
                                        {{ $category->parentCategory ? $category->parentCategory->name : '' }}
                                    </td>

                                    <td class="text-center">
                                        <div style="align-items: center ;justify-content: center; display: flex;">
                                            @include('admin.categories.edit')
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                  method="post"
                                                  onsubmit="return confirm('Do you want to delete this?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger ml-1">Trash</button>
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
    // Function to show/hide category input based on checkbox
    function toggleInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        if (checkbox && input) {
            input.style.display = checkbox.checked ? 'block' : 'none';
        }
    }


    // Reset visibility of dropdowns on modal open
    document.addEventListener("DOMContentLoaded", function () {
        const createCheckbox = document.getElementById('showCategoryInputCreate');
        toggleInput('showCategoryInputCreate', 'categoryInputCreate');

        @foreach($categories as $category)
        toggleInput('showCategoryInputEdit{{$category->id}}', 'categoryInputEdit{{$category->id}}');
        @endforeach
    });
</script>

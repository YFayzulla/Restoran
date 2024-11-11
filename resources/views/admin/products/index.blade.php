<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white header-custom leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-input-alert_success></x-input-alert_success>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.products.create')
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nomi</th>
                                <th class="text-center">Qo`shimcha malumot</th>
                                <th class="text-center">Narxi</th>
                                <th class="text-center">Kategoriyasi</th>
                                <th class="text-center">Rasim</th>
                                <th class="text-center">Harakatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $Product)
                                <tr>
                                    <td class="text-center">{{$Product->id}}</td>
                                    <td class="text-center">{{$Product->name}}</td>
                                    <td class="text-center">{{$Product->description}}</td>
                                    <td class="text-center">{{$Product->price}}</td>
                                    <td class="text-center">{{$Product->category->name}}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $Product->photo) }}" class="mx-auto"
                                             style="width: 100px; height: 60px;" alt="uploading...">
                                    </td>

                                    <td class="text-center">

                                        <div class="d-flex">
                                            @include('admin.products.edit')
                                            <form action="{{route('products.destroy',$Product->id)}}" method="post"
                                                  onsubmit="return confirm(' O`chirishni xoxlaysizmi ');">
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
    // Function to load subcategories based on the selected category
    function loadSubcategories(productId = null) {
        const categoryId = productId ? document.getElementById('category' + productId).value : document.getElementById('category').value;
        const subcategoryContainer = productId ? document.getElementById('subcategory-container' + productId) : document.getElementById('subcategory-container');
        const subcategorySelect = productId ? document.getElementById('subcategory' + productId) : document.getElementById('subcategory');

        subcategorySelect.innerHTML = '<option value="">kategoriya Tanlang </option>';

        if (categoryId) {
            fetch(`/api/categories/${categoryId}/subcategories`)
                .then(response => response.json())
                .then(data => {
                    if (data.subcategories && data.subcategories.length > 0) {
                        subcategoryContainer.style.display = 'block';
                        data.subcategories.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.text = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    } else {
                        subcategoryContainer.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error fetching subcategories:', error);
                    subcategoryContainer.style.display = 'none';
                });
        } else {
            subcategoryContainer.style.display = 'none';
        }
    }
</script>

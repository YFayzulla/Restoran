<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-white header-custom leading-tight">
            {{ __('user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-input-alert_success></x-input-alert_success>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.users.create')
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nomi</th>
                                <th class="text-center">Tel raqami</th>
                                <th class="text-center">Oyligi</th>
                                <th class="text-center">Harakatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$user->id}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->phone}}</td>
                                    <td class="text-center">{{$user->salary}}</td>
{{--                                    <td class="text-center">--}}
{{--                                    </td>--}}
                                    <td class="text-center mx-auto">
                                        <div class="d-flex">
                                            @include('admin.users.edit')
                                            <form action="{{route('users.destroy',$user->id)}}" method="post"  onsubmit="return confirm(' O`chirishni xoxlaysizmi ');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger ml-1" > yoq qilish</button>
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
    // Function to show/hide user input based on checkbox
    function toggleInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        if (checkbox && input) {
            input.style.display = checkbox.checked ? 'block' : 'none';
        }
    }


    // Reset visibility of dropdowns on modal open
    document.addEventListener("DOMContentLoaded", function () {
        const createCheckbox = document.getElementById('showuserInputCreate');
        toggleInput('showuserInputCreate', 'userInputCreate');

        @foreach($users as $user)
        toggleInput('showuserInputEdit{{$user->id}}', 'userInputEdit{{$user->id}}');
        @endforeach
    });
</script>

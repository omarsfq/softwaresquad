<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('إضافة عضو جديد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.teammembers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">اسم العضو</label>
                            <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="name" required />
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">دور العضو</label>
                            <input id="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="role" required />
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">صورة العضو</label>
                            <input id="image" type="file" name="image" class="block mt-1 w-full" required/>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

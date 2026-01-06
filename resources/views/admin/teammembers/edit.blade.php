<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('تعديل بيانات العضو') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.teammembers.update', $member) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">اسم العضو</label>
                            <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="name" value="{{ old('name', $member->name) }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">دور العضو</label>
                            <input id="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="role" value="{{ old('role', $member->role) }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">تغيير الصورة (اختياري)</label>
                            <input id="image" type="file" name="image" class="block mt-1 w-full"/>
                            <img src="{{ asset('storage/'.$member->image_path) }}" alt="{{ $member->name }}" class="mt-2 h-20 w-auto rounded">
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

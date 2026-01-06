<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('تعديل المشروع: ') }} {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">

                    {{-- التأكد من أن المتحكم قد أرسل المتغير بشكل صحيح --}}
                    @if(isset($project))
                        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title" class="block font-medium text-sm text-gray-700">عنوان المشروع</label>
                                <input id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" value="{{ old('title', $project->title) }}" required />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block font-medium text-sm text-gray-700">وصف المشروع</label>
                                <textarea id="description" name="description" rows="8" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description', $project->description) }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="cover_image" class="block font-medium text-sm text-gray-700">تغيير صورة الغلاف (اختياري)</label>
                                <input id="cover_image" type="file" name="cover_image" class="block mt-1 w-full"/>
                                <div class="mt-2">
                                    <span class="text-sm text-gray-500">الصورة الحالية:</span>
                                    <img src="{{ asset('storage/' . $project->cover_image_path) }}" alt="الصورة الحالية" class="mt-2 h-20 w-auto rounded shadow">
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-900 ml-4">إلغاء</a>
                                {{-- تم تعديل لون الزر ليتناسب مع الهوية الجديدة --}}
                                <button type="submit" class="px-5 py-2 bg-brand-blue text-white font-semibold rounded-md hover:bg-opacity-90 transition">
                                    تحديث المشروع
                                </button>
                            </div>
                        </form>
                    @else
                        <p>لم يتم العثور على المشروع المطلوب.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

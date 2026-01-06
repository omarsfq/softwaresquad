@extends('layouts.public')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        {{-- التأكد من وجود مسار الصورة قبل عرضها --}}
        @if($project->cover_image_path)
            <img src="{{ asset($project->cover_image_path) }}" alt="{{ $project->title }}">

        @endif

        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $project->title }}</h1>

            {{-- استخدام nl2br لتحويل أسطر النص الجديدة إلى <br> لظهور التنسيق الصحيح --}}
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! nl2br(e($project->description)) !!}
            </div>

            <div class="mt-10">
                <a href="{{ route('projects.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                    &rarr; العودة إلى كل المشاريع
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

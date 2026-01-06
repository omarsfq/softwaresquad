@extends('layouts.public')

@section('title', 'الرئيسية - Software Squad')

@section('content')

    <div class="bg-brand-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">

            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight bg-gradient-to-r from-brand-green-light to-brand-blue text-transparent bg-clip-text">
                Software Squad
            </h1>

            <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-slate-400">
                نحن فريق من المبدعين والمطورين، نحول الأفكار إلى واقع رقمي ملموس.
            </p>

            {{-- الاقتراح الأول: الزر بالتدرج اللوني --}}
            <div class="mt-10">
                <a href="{{ route('projects.index') }}"
                   class="font-bold rounded-full py-3 px-8 text-lg text-white
                          bg-gradient-to-r from-brand-green-light to-brand-green
                          hover:shadow-lg hover:shadow-brand-green/30 transition-all duration-300">
                    استعرض أعمالنا
                </a>
            </div>
        </div>
    </div>

    <div class="bg-slate-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- الاقتراح الثاني: تلوين العنوان --}}
            <h2 class="text-4xl font-bold text-center text-brand-blue mb-12">أحدث المشاريع</h2>

            @if($latestProjects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestProjects as $project)
                        {{-- الاقتراح الثالث: تأثير مرور الماوس على البطاقة --}}
                        <div class="bg-white rounded-lg shadow-xl overflow-hidden group border-t-4 border-transparent hover:border-brand-green transition-all duration-300">
                            <a href="{{ route('projects.show', $project) }}" class="block">
                                <div class="overflow-hidden">
                                     <img src="{{ asset($project->cover_image_path) }}" alt="{{ $project->title }}">
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $project->title }}</h3>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($project->description, 100) }}</p>
                                    <span class="inline-block mt-4 text-brand-blue font-semibold">
                                        عرض التفاصيل &larr;
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 mt-4">سيتم إضافة المشاريع قريباً.</p>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    @keyframes gradient-animation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient-animation 5s ease infinite;
    }
</style>
@endpush

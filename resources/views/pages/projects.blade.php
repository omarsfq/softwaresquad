@extends('layouts.public')

@section('title', 'مشاريعنا - Software Squad')

@section('content')

    <div class="bg-brand-navy">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight
                       bg-gradient-to-r from-brand-green-light to-brand-blue text-transparent bg-clip-text animate-gradient">
                معرض أعمالنا
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-slate-400">
                نفخر بما أنجزناه. تصفح مجموعة من المشاريع التي قمنا بتنفيذها.
            </p>
        </div>
    </div>

    <div class="bg-slate-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        {{-- تم تطبيق نفس تأثير البطاقة من الصفحة الرئيسية --}}
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
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <p class="text-center text-gray-500 text-xl mt-8">لا توجد مشاريع لعرضها حالياً.</p>
            @endif
        </div>
    </div>
@endsection

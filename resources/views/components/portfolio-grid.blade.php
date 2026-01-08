@props(['projects' => collect()])
<section class="bg-slate-100 py-20 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-brand-blue mb-12">أحدث المشاريع</h2>
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-lg shadow-xl overflow-hidden group border-t-4 border-transparent hover:border-brand-green transition-all duration-300">
                        <a href="{{ route('projects.show', $project) }}" class="block">
                            <div class="overflow-hidden">
                                <img
                                    loading="lazy"
                                    class="w-full h-48 object-cover"
                                    style="aspect-ratio: 16/9"
                                    src="{{ asset($project->cover_image_path) }}"
                                    alt="{{ $project->title }}"
                                    sizes="(min-width:1024px) 33vw, (min-width:768px) 50vw, 100vw"
                                    width="800"
                                    height="450">
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
</section>

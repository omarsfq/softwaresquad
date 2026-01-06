@extends('layouts.public')

@section('title', 'من نحن - Software Squad')

@section('content')

    <div class="bg-brand-navy">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight
                       bg-gradient-to-r from-brand-green-light to-brand-blue text-transparent bg-clip-text animate-gradient">
                تعرّف على فريقنا
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-slate-400">
                نحن مجموعة من المحترفين الشغوفين بعملهم، ونسعى لتقديم أفضل الحلول لعملائنا.
            </p>
        </div>
    </div>

    <div class="bg-slate-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($teamMembers as $member)
                    <div class="bg-white rounded-lg shadow-xl p-8 flex flex-col items-center text-center transform hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex-shrink-0">
                            <img class="h-40 w-40 rounded-full object-cover shadow-lg" src="{{ asset($member->image_path) }}"     alt="صورة {{ $member->name }}">

                        </div>
                        <div class="mt-6">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $member->name }}</h3>
                            <p class="text-brand-blue font-semibold text-lg mt-1">{{ $member->role }}</p>
                        </div>
                    </div>
                @empty
                     <p class="text-center text-gray-500 col-span-3">سيتم إضافة أعضاء الفريق قريباً.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

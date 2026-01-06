@extends('layouts.public')

@section('title', 'تواصل معنا - Software Squad')

@section('content')

    <div class="bg-brand-navy">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight
                       bg-gradient-to-r from-brand-green-light to-brand-blue text-transparent bg-clip-text animate-gradient">
                تواصل معنا
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-slate-400">
                هل لديك استفسار أو فكرة مشروع؟ نود أن نسمع منك.
            </p>
        </div>
    </div>

    <div class="bg-slate-100 py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-xl">
                @if (session('success'))
                    <div class="bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-blue focus:border-brand-blue">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-blue focus:border-brand-blue">
                        </div>
                        <div>
                            <label for="request_type" class="block text-sm font-medium text-gray-700">نوع الطلب</label>
                            <select id="request_type" name="request_type" required
    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 
           focus:outline-none focus:ring-brand-blue focus:border-brand-blue 
           sm:text-sm rounded-md">

    <option value="">اختر نوع الطلب</option>
    <option value="استفسار">استفسار</option>
    <option value="عرض عمل">عرض عمل</option>
    <option value="تعاون">تعاون</option>
    <option value="دعم فني">دعم فني</option>
    <option value="آخر">آخر</option>
</select>

                        </div>
                        <div>
                             <label for="message" class="block text-sm font-medium text-gray-700">الرسالة</label>
                             <textarea id="message" name="message" rows="5" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-blue focus:border-brand-blue" placeholder="يجب أن تحتوي الرسالة على 10 أحرف على الأقل."></textarea>
                        </div>
                    </div>

                    <div class="mt-8 text-left">
                        {{-- تم تطبيق تصميم الزر الجديد --}}
                        <button type="submit"
                                class="w-full sm:w-auto font-bold rounded-full py-3 px-8 text-lg text-white
                                       bg-gradient-to-r from-brand-green-light to-brand-green
                                       hover:shadow-lg hover:shadow-brand-green/30 transition-all duration-300">
                            إرسال الرسالة
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

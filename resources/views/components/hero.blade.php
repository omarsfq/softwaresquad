<section class="bg-brand-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 md:py-32 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight bg-gradient-to-r from-brand-green-light to-brand-blue text-transparent bg-clip-text">
            Software Squad
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-slate-400">
            نُحوّل الأفكار إلى حلول رقمية متقنة وفعّالة.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('projects.index') }}"
               class="inline-flex flex-none w-auto max-w-max whitespace-nowrap items-center justify-center font-bold rounded-full py-3 px-8 text-lg text-white
                      bg-gradient-to-r from-brand-green-light to-brand-green
                      hover:shadow-lg hover:shadow-brand-green/30 transition-all duration-300">
                استعرض أعمالنا
            </a>
            <a href="{{ route('contact.form') }}"
               class="inline-flex flex-none w-auto max-w-max whitespace-nowrap items-center justify-center font-bold rounded-full py-3 px-8 text-lg
                      bg-white text-brand-blue hover:bg-slate-100 transition-all duration-300">
                ابدأ مشروعك الآن
            </a>
        </div>
    </div>
</section>

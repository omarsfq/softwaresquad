<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('رسائل التواصل الواردة') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($contacts as $contact)
                        <div class="border-b border-gray-200 py-4">
                           <div class="flex justify-between items-center">
                               <div>
                                    <p class="font-bold text-gray-800">{{ $contact->name }} <span class="font-normal text-sm text-gray-500">&lt;{{ $contact->email }}&gt;</span></p>
                                    <p class="text-sm text-gray-600 mt-1">النوع: <span class="font-semibold">{{ $contact->request_type }}</span> - <span class="text-xs">{{ $contact->created_at->diffForHumans() }}</span></p>
                               </div>
                               <div>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold">حذف</button>
                                    </form>
                               </div>
                           </div>
                            <p class="mt-3 text-gray-700 bg-gray-50 p-3 rounded-md">{{ $contact->message }}</p>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 py-8">لا توجد رسائل لعرضها حالياً.</p>
                    @endforelse

                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

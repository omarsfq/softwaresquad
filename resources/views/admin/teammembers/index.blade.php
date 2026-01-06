<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('إدارة أعضاء الفريق') }}
            </h2>
            <a href="{{ route('admin.teammembers.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                إضافة عضو جديد
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table class="min-w-full divide-y divide-gray-200">
                       <thead class="bg-gray-50">
                           <tr>
                               <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الاسم</th>
                               <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الدور</th>
                               <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الإجراءات</th>
                           </tr>
                       </thead>
                       <tbody class="bg-white divide-y divide-gray-200">
                           @forelse ($members as $member)
                               <tr>
                                   <td class="px-6 py-4">{{ $member->name }}</td>
                                   <td class="px-6 py-4">{{ $member->role }}</td>
                                   <td class="px-6 py-4 text-sm font-medium">
                                       <a href="{{ route('admin.teammembers.edit', $member) }}" class="text-indigo-600 hover:text-indigo-900">تعديل</a>
                                       <form action="{{ route('admin.teammembers.destroy', $member) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('هل أنت متأكد؟');">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                       </form>
                                   </td>
                               </tr>
                           @empty
                               <tr><td colspan="3" class="px-6 py-4 text-center">لا يوجد أعضاء مضافين بعد.</td></tr>
                           @endforelse
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

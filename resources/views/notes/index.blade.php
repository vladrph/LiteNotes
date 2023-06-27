<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
           @foreach($notes as $note)

               <div>
                   <h2>
                       {{ $note ->title }}
                   </h2>
                   <p>
                       {{ Str::limit($note->text,200)}}

                   </p>
                    <span class="block mt-4 text-sm opacity-70">{{$note -> updated_at->diffForHumans()}}
               </div>


           @endforeach



            {{$notes->links() }}
        </div>
    </div>
</x-app-layout>

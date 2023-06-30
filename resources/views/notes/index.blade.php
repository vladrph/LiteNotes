<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ request()->routeIs('notes.index') ?__('Notes'): __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class ="mb-4 px-4 py-2 bg-green-100 border-green-200 text-green-700 rounded-md" >
                    {{session('success')}}
                </div>
            @endif
                 @if(request()->routeIs('notes.index'))
                    <a href="{{ route('notes.create') }}" class=" btn-link btn-lg mb-2">+ New Note </a>
                @endif

            @forelse($notes as $note)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                        <h2 class = "my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <a
                                @if(request()->routeIs('notes.index'))
                                href = "{{ route('notes.show',$note) }}"
                            @else
                                href = "{{ route('trashed.show',$note) }}"
                                @endif
                            > {{ $note ->title }} </a>
                        </h2>
                        <p class = "mt-2">

                            {{ Str::limit($note->text,200)}}

                        </p>
                        <span class="block mt-4 text-sm opacity-70">{{$note -> updated_at->diffForHumans()}}

                </div>
                    @empty
                         @if(request()->routeIs('notes.index'))

                        <p> You have no notes </p>

                          @else
                        <p> You have no trashed items. </p>
                         @endif
                @endforelse

                    {{$notes->links() }}

        </div>
    </div>
</x-app-layout>

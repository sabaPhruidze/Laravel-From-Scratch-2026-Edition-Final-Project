<x-layout>
    <div class="py-8 max-w-4xl mx-auto">
       <div class="flex justify-between items-center">
         <a href="{{route('ideas.index')}}" class="flex items-center gap-x-2 text-sm font-medium"><x-icons.arrow-back/> Back to Ideas</a>
        <div class="gap-x-3 flex items-center">
            <button class="btn btn-outlined"><x-icons.external/> Edit Idea</button>
           <form method="POST" action="{{route('ideas.destroy',$idea)}}">
            @csrf
            @method('DELETE')

             <button class="btn btn-outlined text-red-500">Delete</button>
           </form>
        </div>
       </div>
    </div>
    <x-card class="mt-6">
        <div class="text-foreground max-w-none cursor-pointer">{{$idea->description}}</div>
    </x-card>
</x-layout>

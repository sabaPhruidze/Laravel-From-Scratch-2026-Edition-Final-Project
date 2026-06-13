<x-layout>
    <div>
      <header class="py-8 md:py-12">
        <h1 class="text-3xl font-bold">Ideas</h1>
        <p class="text-muted-foreground text-sm mt-2">Capture your thoughts . Make a plan</p>
      </header>
      <div>
        <a href="/ideas/?status=pending" class="btn {{request('status') === 'pending' ? '' : 'btn-outlined'}}">
          pending
        </a>
         <a href="/ideas/?status=in_progress" class="btn {{request('status') === 'in_progress' ? '' : 'btn-outlined'}}">
          In progress
        </a>
         <a href="/ideas/?status=completed" class="btn {{request('status') === 'completed' ? '' : 'btn-outlined'}}">
          Completed
        </a>
      </div>
      <div class="mt-10 text-muted-foreground">
       <div class="grid md:grid-cols-2 gap-6">
         @forelse($ideas as $idea)
           <x-card href="{{route('idea.show',$idea)}}">
             <h3 class="text-foreground text-lg">{{$idea->title}}</h3>
             <div>
              <x-ideas.status-label status="{{$idea->status}}">{{$idea->status->label()}}</x-ideas.status-label>
             </div>
             <div class="mt-5 line-clamp-3">{{$idea->description}}</div>
             <div class="mt-4">{{$idea->created_at->diffForHumans()}}</div>
           </x-card>       
            @empty
                <p>No ideas at this time</p>
        @endforelse
       </div>
      </div>
    </div>
</x-layout>
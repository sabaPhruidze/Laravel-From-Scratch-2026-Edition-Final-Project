@props(['name','title'])
<div 
       x-data="{show:false,name: @js($name)}"
       x-show="show"
       @open-modal.window="if($event.detail === name) show = true;"
       @close-modal="show=false"
       @keydown.escape.window="show=false"
       class="flex fixed inset-0 z-50 items-center justify-center bg-black/50 backdrop-blur-xs"
       x-transition:enter="ease-out duration-200"
       x-transition:enter-start="opacity-0 -translate-y-4 -translate-x-4"
       x-transition:enter-end="opacity-100"
       x-transition:leave="ease-in duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0 -translate-y-4 -translate-x-4"
       style="display:none" 
       role="dialog"
       aria-modal="true"
       aria-labelledby="modal-{{$name}}-title"
       :aria-hidden="! show"
       tabindex="-1"
       >  
        <x-card is="div" @click.away="show=false" class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">
            <div class="flex justify-between items-center">
                <h2 
                class="text-xl font-bold" 
                id="modal-{{$name}}-title"
                >{{$title}}</h2>
                <button @click="show = false" aria-label="Close modal">
                  <x-icons.close/>
                </button>
            </div>
          <div class="mt-5">
            {{$slot}}
         </div>
        </x-card>
       </div>

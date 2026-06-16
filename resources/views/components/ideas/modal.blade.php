@props(['idea' => new App\Models\Idea()])


<x-modal name="{{$idea->exists ? 'edit-idea' : 'create-idea'}}" title="{{$idea->exists ? 'Edit Idea' : 'New Idea'}}">
       <form x-data="{
          status: 'pending',
          newLink: '',
          links: [],
          newStep: '',
          steps: [],
          }" 
          method="POST" 
          action="{{route('ideas.store')}}"
          enctype="multipart/form-data"
        >
        @csrf
        <div class="space-y-6">
          <x-form.field 
          label="Title"
          name="title"
          placeholder="Enter an idea for your title"
          autofocus
          required
          value='footbar'
        />
          <div class="flex flex-col gap-y-3">
            <label for="status" class="label">Status</label>
            <div class="flex gap-x-3">
              @foreach (App\IdeaStatus::cases() as $status)
                <button type="button" @click="status = @js($status->value)" class="btn flex-1 h-10" :class="status===@js($status->value) ? '' : 'btn-outlined'" data-test="button-status-{{$status->value}}">{{$status->label()}}</button>
              @endforeach
              <input 
              type="hidden" 
              name="status" :value="status" 
              class="input"
              >
            </div>
            <x-form.error name="status"/>
          </div>
          <x-form.field 
           label="Description"
           name="description"
           type="textarea"
           placeholder="Describe your idea..."
          />

          <!-- images -->
          <div class="space-y-2">
            <label for="image" class="label">Featured image</label>
            <input 
             type="file" 
             name="image" 
             accept="images/*"
             class="block w-full text-sm text-gray-700
               file:mr-4 file:rounded-md file:border-0
               file:bg-green-600 file:px-3 file:py-2
               file:text-black hover:file:bg-green-700 cursor-pointer"
             >
            <x-form.error name="image"/>
          </div>

          <div>
            <fieldset class="space-y-3">
              <legend class="label">Actionable Steps</legend>
              <template x-for="(step,index) in steps" :key="step">
                <div class="flex gap-x-2 items-center">
                  <input name="steps[]" x-model="step" class="input">
                  
                <button 
                 type="button" 
                 aria-label="remove step"
                 @click="steps.splice(index,1)"
                 class="form-muted-icon"
                >
                  <x-icons.close/>
                </button>
                </div>
              </template>

              <div class="flex gap-x-2 items-center">
                <input 
                x-model="newStep"
                data-test="new-step"
                id="new-step"
                placeholder="What needs to be done?"
                class="input flex-1"
                spellcheck="false"
                >
                
                <button 
                type="button" 
                @click="steps.push(newStep.trim()); newStep=''"
                :disabled="newStep.trim().length === 0"
                aria-label="Add link button"
                class="form-muted-icon"
                data-test="submit-new-link-button"
                >
                  <x-icons.close class="rotate-45"/>
                </button>
              </div>

            </fieldset>
          </div>
          <div>
            <fieldset class="space-y-3">
              <legend class="label">Links</legend>
              <template x-for="(link,index) in links" :key="link">
                <div class="flex gap-x-2 items-center">
                  <input name="links[]" x-model="link" class="input">
                  
                <button 
                 type="button" 
                 aria-label="remove link"
                 @click="links.splice(index,1)"
                 class="form-muted-icon"
                >
                  <x-icons.close/>
                </button>
                </div>
              </template>

              <div class="flex gap-x-2 items-center">
                <input 
                x-model="newLink"
                data-test="new-link"
                type="url"
                id="new-link"
                placeholder="http://example.com"
                autocomplete="url"
                class="input flex-1"
                spellcheck="false"
                >
                
                <button 
                type="button" 
                @click="links.push(newLink.trim()); newLink=''"
                :disabled="newLink.trim().length === 0"
                aria-label="Add link button"
                class="form-muted-icon"
                data-test="submit-new-link-button"
                >
                  <x-icons.close class="rotate-45"/>
                </button>
              </div>
              <!-- <pre x-text="JSON.stringify(links)">
                in order to see beforehand what happens
              </pre> -->
            </fieldset>
          </div>
           <div class="flex justify-end gap-x-5">
            <button type="button" @click="$dispatch('close-modal')">Cancel</button>
            <button type="submit" class="btn">Create</button>
           </div>
        </div>
       
       </form>
      </x-modal>
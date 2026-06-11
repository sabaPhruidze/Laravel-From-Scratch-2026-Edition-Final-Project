@props(['label','name','type'=>'text'])
<div class="space-y-2">
    <label for={{$name}} class="label">
       {{$label}}
    </label>
    <input type={{$type}} id={{$name}} name={{$name}} class="input" {{$attributes}}>
    
    @error($name)
    <p class="text-sm text-red-500 mt-1">{{$message}}</p>
    @enderror
</div>
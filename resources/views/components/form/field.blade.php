@props(['label','name','type'=>'text'])
<div class="space-y-2">
    <label for={{$name}} class="label">
       {{$label}}
    </label>
    <input type={{$type}} id={{$name}} name={{$name}} class="input" {{$attributes}}>
</div>
<x-layout>
   <x-form title="Edit your account" description='Need to make a tweak?'>
    <form action="/profile/edit" method="POST" class="mt-10 space-y-4">
            @csrf
            @method('PATCH')
           <x-form.field label='Name' name='name'/>
            <x-form.field label='Email' name='email' type='email'/>
           <x-form.field label='Password' name='password' type='password'/>
            <button type="submit" class="mt-2 btn h-10 w-full">Update account</button>
        </form>
   </x-form>
</x-layout>
<x-layout>
    <x-form title="Log In" description="Glad to have you back.">
        <form method="post" action="/login" class="mt-10 space-y-4">
            @csrf

            <x-form.field label="Email Address" name="email" type="email"></x-form.field>
            <x-form.field label="Password" name="password" type="password"></x-form.field>

            <button type="submit" class="btn my-2 h-10 w-full">Sign In</button>
        </form>
    </x-form>
</x-layout>
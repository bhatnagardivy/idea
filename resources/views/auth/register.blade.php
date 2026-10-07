<x-layout>
    <x-form title="Register an account" description="Start tracking your ideas today.">
        <form method="post" action="/register" class="mt-10 space-y-4">
            @csrf

            <x-form.field label="Name" name="name" type="text"></x-form.field>
            <x-form.field label="Email Address" name="email" type="email"></x-form.field>
            <x-form.field label="Password" name="password" type="password"></x-form.field>

            <button type="submit" class="btn my-2 h-10 w-full">Create Account</button>
        </form>
    </x-form>
</x-layout>
<x-admin-layout>
    <!--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>-->
        
    <h1 class="text-center">Klant toevoegen</h1>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}" style="margin: 0 auto;">
        @csrf
        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        
        @php
        $displayedProjects = [];
    @endphp
    <div class="form-group">
        <label for="project">Project</label>
        <select name="project" id="project">
        @foreach ($issues as $issue)
            @if (!in_array($issue->fields->project->key, $displayedProjects))
                    <option value="{{$issue->fields->project->key}}">
                        {{ $issue->fields->project->name }}
                    </option>
                @php
                    $displayedProjects[] = $issue->fields->project->key;
                @endphp
            @endif
        @endforeach
        </select>
    </div>

        

        <div class="flex items-center justify-end mt-4">
            <!--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>-->

            <x-button class="ml-4" style="margin: 0 auto;">
                {{ __('Toevoegen') }}
            </x-button>
        </div>
    </form>
</x-admin-layout>

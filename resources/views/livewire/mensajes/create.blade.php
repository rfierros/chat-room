<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate();
 
        auth()->user()->mensajes()->create($validated);
 
        $this->message = '';
    }
}; ?>

<div class="mt-6">
    <form wire:submit="store"> 
        <textarea
            wire:model="message"
            placeholder="{{ __('Type here your message...') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
 
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Send') }}</x-primary-button>
    </form> 
</div>

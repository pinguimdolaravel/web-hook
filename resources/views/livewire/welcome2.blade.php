<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $name = 'Welcome2 Jeremias';

}; ?>

<div>
    <input wire:model.live="name" />
    {{ $name }}
</div>

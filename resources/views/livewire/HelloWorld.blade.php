<?php

use function Livewire\Volt\{state, mount};

state([
    'count' => 0,
    'name' => null,
]);
mount(function () {
    $this->count = 1;
});

$decrement = function (){
    $this->count--;
};


$increment = function (){
    $this->count++;
};

?>

<div>
    <div class="flex space-x-4">
        <button wire:click="decrement">-</button>
        <span>{{$count}}</span>
        <button wire:click="increment">+</button>
    </div>

    <input type="text" wire:model.live="name">
    hello {{$name}}
</div>

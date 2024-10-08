<div>
    <h5>{{ $count }}</h5>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>

    <h4>Probando Model</h4>
    <input type="text" wire:model.live="variable">
    <h5>{{ $variable }}</h5>
</div>

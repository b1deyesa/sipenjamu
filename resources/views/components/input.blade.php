<div class="input" {{ $attributes }} style="width: {{ $width }}">
    
    {{-- Label --}}
    @if($label)<span class="input__label">{{ $label }}</span>@endif
    
    {{-- Inputs --}}
    @switch($type)
        @case('select')
            <div class="select @error($name) error @enderror">
                <select
                    id="{{ $id }}"
                    name="{{ $name }}"
                    @if($class) class="{{ $class }}" @endif
                    @if($wire) wire:model="{{ $wire }}" @endif
                    {{ $attributes }}
                    >
                    @if($placeholder) <option value="" selected>{{ $placeholder }}</option> @endif
                    @foreach ($options as $key => $option)
                        <option value="{{ $key }}" @selected($key === old($name, $value))>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            @break
        @case('select-search')
            <div x-data="{ options: @js($options), q: @entangle($wire . '.value'), k: @entangle($wire . '.key'), isFocused: false, filtered() { if (!this.q) { return Object.entries(this.options); } return Object.entries(this.options).filter(([_, v]) => v.toLowerCase().includes(this.q.toLowerCase())); }, choose(key, val) { this.k = key; this.q = val; this.isFocused = false; $wire.set('{{ $wire }}.key', key); $wire.set('{{ $wire }}.value', val); }, blurHandler() { setTimeout(() => { this.isFocused = false; }, 150); let f = Object.entries(this.options).find(([_, v]) => v.toLowerCase() === this.q.toLowerCase()); if (f) { this.k = f[0]; this.q = f[1]; $wire.set('{{ $wire }}.key', f[0]); $wire.set('{{ $wire }}.value', f[1]); } else { this.k = ''; $wire.set('{{ $wire }}.key', ''); $wire.set('{{ $wire }}.value', this.q); } } }" class="select-search">
                <input type="text" x-model="q" @focus="isFocused = true" @input="isFocused = true" @blur="blurHandler" placeholder="{{ $placeholder }}" class="{{ $class }} @error($name.'.key') error @enderror">
                <input type="hidden" x-model="k" name="{{ $wire }}[key]">
                <ul x-show="isFocused" x-transition>
                    <template x-for="[key, val] in filtered()" :key="key">
                        <li @mousedown.prevent="choose(key, val)" x-text="val"></li>
                    </template>
                </ul>
            </div>          
            @break
        @case('checkbox')
            <span class="checkbox {{ $class }} @error($name) error @enderror">
                <input type="hidden" name="{{ $name }}" value="">
                @foreach ($options as $key => $option)
                    <label for="{{ $id }}-{{ $key }}-{{ $uniqid }}">
                        <input
                            type="checkbox"
                            id="{{ $id }}-{{ $key }}-{{ $uniqid }}" 
                            name="{{ $name }}[{{ $key }}]"
                            value="{{ $key }}"
                            @if($wire) wire:model.live="{{ $wire }}.{{ $key }}" @endif
                            @checked(in_array($key, (array) old($name, json_decode($value ?? '[]', true))))
                            {{ $attributes }}
                        >
                        {{ $option }}
                    </label>
                @endforeach
            </span>
            @break
        @case('radio')
            <span class="radio {{ $class }} @error($name) error @enderror">
                <input type="hidden" name="{{ $name }}" value="">
                @foreach ($options as $key => $option)
                    <label for="{{ $id }}-{{ $key }}-{{ $uniqid }}">
                        <input
                            type="radio"
                            id="{{ $id }}-{{ $key }}-{{ $uniqid }}" 
                            name="{{ $name }}"
                            value="{{ $key }}"
                            @if($wire) wire:model.live="{{ $wire }}" @endif
                            @checked(in_array($key, (array) old($name, json_decode($value ?? '[]', true))))
                            {{ $attributes }}
                        >
                        {{ $option }}
                    </label>
                @endforeach
            </span>
            @break
        @case('textarea')
            
            @break
        @default
            <input 
                type="{{ $type }}"
                value="{{ old($name, $value) }}"
                id="{{ $id }}"
                @if($wire) wire:model.live="{{ $wire }}" @endif
                @if($name) name="{{ $name }}" @endif
                @if($placeholder) placeholder="{{ $placeholder }}" @endif
                @required($required)
                autocomplete="off"
                class="{{ $class }} @error($name) error @enderror"
                autofocus
                {{ $attributes }}
                >
    @endswitch
    
    {{-- Error --}}
    @if ($errors->has($name) || $errors->has($name . '.key'))
        <small class="input__error">
            {{ $errors->first($name) ?: $errors->first($name . '.key') }}
        </small>
    @endif
    
</div>    

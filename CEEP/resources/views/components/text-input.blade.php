@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-violet-300 focus:border-indigo-200 focus:ring-indigo-200 rounded-3xl px-18 shadow-sm']) !!}>

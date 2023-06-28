@props(['href', 'text', 'allowed' => true])
@if ($allowed)
	<li>
		<a href="{{ $href }}" class="block py-2 px-3 text-white">{{ $text }}</a>
	</li>
@endif
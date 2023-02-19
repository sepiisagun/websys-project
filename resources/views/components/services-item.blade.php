@props([
    'item'
])
<div class="border-t border-gray-200 pt-4">
	<dt class="font-medium text-gray-900">
        {{ $item['label'] }}
    </dt>
	<dd class="mt-2 text-sm text-gray-500">
        {{ $item['description'] }}
    </dd>
</div>

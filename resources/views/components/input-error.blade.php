@props(['messages'])
@vite(['resources/css/app.css', 'resources/js/app.js'])

@if ($messages)
    <script>
        var $targetEl = document.getElementById('authentication-modal');
        // options with default values
        var options = {
            placement: 'center',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            closable: true,
        };

        var modal = new Modal($targetEl, options);
        modal.toggle();

        function closeModal() {
            modal.hide();
        }
    </script>
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<div {{ $attributes->merge(['class' => 'overflow-auto rounded-md shadow-sm']) }}>
    <table class="w-full text-gray-900 dark:text-gray-100">
        <thead class="bg-gray-100 dark:bg-gray-900">
        <tr class="text-xs">
            {{ $thead }}
        </tr>
        </thead>
        @isset($tbody)
            <tbody class="divide-y divide-gray-100 dark:divide-gray-900 text-center">
            {{ $tbody }}
            </tbody>
        @endisset
        @isset($caption)
            <caption class="caption-bottom p-3 font-bold tracking-wider">
                {{ $caption }}
            </caption>
        @endisset
    </table>
</div>

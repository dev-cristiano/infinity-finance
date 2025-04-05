@props([
'headers' => [],
'rows' => [],
'emptyMessage' => 'Nenhum registro encontrado'
])

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            @foreach($headers as $header)
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ $header }}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($rows as $row)
        <tr>
            @foreach($row['columns'] as $column)
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                {{ $column }}
            </td>
            @endforeach
        </tr>
        @empty
        <tr>
            <td colspan="{{ count($headers) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                {{ $emptyMessage }}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
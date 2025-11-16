<x-layouts.app :title="__('Dashboard')">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Questions List</h2>
            <a href="{{ route('questions.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Create Question
            </a>
        </div>

        {{-- Flash message --}}
        @if (session('message'))
        <div class="p-3 mb-4 bg-green-100 text-green-800 rounded">
            {{ session('message') }}
        </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto border rounded-lg">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Criteria</th>
                        <th class="px-4 py-2 border">Question</th>
                        <th class="px-4 py-2 border">Type</th>
                        <th class="px-4 py-2 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($questions as $index => $q)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $q->criteria->name ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $q->question_text }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $q->type }}</td>
                        <td class="px-4 py-2 border text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('questions.edit', $q->id) }}"
                                    class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">Edit</a>
                                <form action="{{ route('questions.destroy', $q->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this question?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No questions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.app>

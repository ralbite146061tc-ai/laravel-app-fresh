<x-layout title="All Users">
    <div class="max-w-6xl mx-auto mt-10 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Registered Users</h1>
            <a href="/users/create"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition">
                + Register New User
            </a>
        </div>


        @if (session('success'))
            <div class="bg-green-500 text-white rounded p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($users->isEmpty())
            <div class="bg-white text-gray-600 rounded-lg p-8 text-center shadow">
                <p class="text-lg">No users registered yet.</p>
                <a href="/users/create" class="text-blue-600 hover:underline mt-2 inline-block">Register the first user →</a>
            </div>
        @else
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left bg-white text-gray-800">
                    <thead class="bg-blue-800 text-white uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Full Name</th>
                            <th class="px-4 py-3">Nickname</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Age</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 text-gray-400">{{ $user->id }}</td>
                                <td class="px-4 py-3 font-semibold">
                                    {{ $user->last_name }}, {{ $user->first_name }}
                                    @if ($user->middle_name)
                                        {{ $user->middle_name[0] }}.
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $user->nickname ?? '—' }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-center">{{ $user->age }}</td>
                                <td class="px-4 py-3">{{ $user->contact_number }}</td>
                                <td class="px-4 py-3 max-w-xs truncate" title="{{ $user->address }}">{{ $user->address }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-center gap-2">

                                        <a href="/users/{{ $user->id }}/edit"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-bold py-1 px-3 rounded transition">
                                            Edit
                                        </a>

                                        <form action="/users/{{ $user->id }}" method="POST"
                                            onsubmit="return confirm('Delete {{ $user->first_name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1 px-3 rounded transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-gray-400 text-sm mt-3">Total: {{ $users->count() }} user(s)</p>
        @endif
    </div>
</x-layout>

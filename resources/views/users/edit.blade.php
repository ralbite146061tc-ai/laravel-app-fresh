<x-layout title="Edit User">
    <div class="max-w-2xl mx-auto mt-10 px-4">
        <h1 class="text-2xl font-bold mb-6 text-white">Edit User</h1>


        @if ($errors->any())
            <div class="bg-red-500 text-white rounded p-4 mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/users/{{ $user->id }}" method="POST" class="bg-white text-gray-800 rounded-lg shadow p-6 space-y-4">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">First Name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Last Name <span class="text-red-500">*</span></label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Nickname</label>
                    <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Age <span class="text-red-500">*</span></label>
                    <input type="number" name="age" value="{{ old('age', $user->age) }}" min="1" max="120"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Contact Number <span class="text-red-500">*</span></label>
                    <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-1">Address <span class="text-red-500">*</span></label>
                    <textarea name="address" rows="2"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('address', $user->address) }}</textarea>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                    Update
                </button>
                <a href="/users" class="text-gray-500 hover:underline text-sm">← Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

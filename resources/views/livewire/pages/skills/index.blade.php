<div>
    <div class="container py-4 mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        <div>
            <h2 class="mb-4 text-lg font-bold">Manage Skills</h2>

            @if (session()->has('message'))
                <div class="p-2 text-white bg-green-500">{{ session('message') }}</div>
            @endif

            <form wire:submit.prevent="{{ $isEditing ? 'updateSkill' : 'saveSkill' }}">
                <input type="text" wire:model="name" placeholder="Enter skill name" class="w-full p-2 border">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

                <button type="submit" class="px-4 py-2 mt-2 text-white bg-blue-500">
                    {{ $isEditing ? 'Update' : 'Add' }} Skill
                </button>
            </form>

            <table class="w-full mt-4 border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Skill Name</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $index => $skill)
                        <tr class="border">
                            <td class="p-2 border">{{ $index + 1 }}</td>
                            <td class="p-2 border">{{ $skill['name'] }}</td>
                            <td class="p-2 border">
                                <button wire:click="editSkill({{ $skill['id']}})" class="px-2 py-1 text-white bg-yellow-500">Edit</button>
                                <button wire:click="deleteSkill({{ $skill['id'] }})" class="px-2 py-1 ml-2 text-white bg-red-500">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

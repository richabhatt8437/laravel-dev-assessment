<div>

    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="px-8 pt-6 pb-8 mb-4 space-y-4 bg-white rounded shadow-md">
        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Title</label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded">
            @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Company Name</label>
            <input type="text" wire:model="company_name" class="w-full p-2 border rounded">
            @error('company_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Location</label>
            <input type="text" wire:model="location" class="w-full p-2 border rounded">
            @error('location') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Experience (Years)</label>
            <input type="text" wire:model="experience" class="w-full p-2 border rounded">
            @error('experience') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Salary Range</label>
            <input type="text" wire:model="salary_range" class="w-full p-2 border rounded">
            @error('salary_range') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Tags (Multiple Input) -->
        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Tags (Comma separated)</label>
            <input type="text" wire:model.lazy="tags" class="w-full p-2 border rounded">

            @error('tags') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Technologies (Multiple Input) -->
        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Technologies (Comma separated)</label>
            <select wire:model="technologies" id="technologies" multiple class="w-full p-2 border rounded">
                @foreach ($technologies as $tech)
                    <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                @endforeach
            </select>

            @error('technologies') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Description</label>
            <textarea wire:model="description" class="w-full p-2 border rounded"></textarea>
            @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-bold text-gray-700">Company Logo</label>
            <input type="file" wire:model="company_logo" class="w-full p-2 border rounded">
            @error('company_logo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
            Save Job Posting
        </button>
    </form>
</div>

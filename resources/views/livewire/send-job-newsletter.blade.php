<div class="p-6 space-y-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="sendNewsletter" class="space-y-4">
        <label class="block text-sm font-medium mb-2">Select Job</label>
        <select wire:model="selectedJob" class="border p-2 rounded w-full mb-4">
            <option value="">-- Choose a job --</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->title }}</option>
            @endforeach
        </select>
        </label>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
            wire:click="sendNewsletter">
            Send Newsletter
        </button>
    </form>
</div>

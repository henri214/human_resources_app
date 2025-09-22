<div class="p-6 space-y-4">
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded">{{ session('error') }}</div>
    @endif

    <!-- Job Selection -->
    <label class="block text-sm font-medium mb-2">Select Job</label>
    <select wire:model="selectedJob" class="border p-2 rounded w-full mb-4">
        <option value="">-- Choose a job --</option>
        @foreach ($jobs as $job)
            <option value="{{ $job->id }}">{{ $job->title }}</option>
        @endforeach
    </select>

    <!-- Candidates Table -->
    @if ($selectedJob)
        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Candidate</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidates as $candidate)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $candidate->name }}</td>
                        <td class="px-4 py-2">{{ $candidate->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Message Box -->
    <textarea wire:model="message" class="w-full border rounded p-2" placeholder="Enter WhatsApp message..." rows="4"></textarea>

    <!-- Send Button -->
    <button wire:click="sendJobMessages" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Send WhatsApp to All Candidates
    </button>
</div>

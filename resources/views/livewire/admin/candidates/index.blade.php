<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Candidates
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            List of Candidates
        </flux:subheading>
        <flux:separator></flux:separator>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded">
                    <table class="min-w-full table">
                        <thead class="bg-gray-200 dark:bg-gray-950">
                            <tr>
                                <x-th>
                                    #
                                </x-th>
                                <x-th>
                                    Name
                                </x-th>
                                <x-th>
                                    Email
                                </x-th>
                                <x-th>
                                    Jobs Applied
                                </x-th>
                                <x-th>
                                    Status
                                </x-th>
                                <x-th>
                                    <span>Actions</span>
                                </x-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $candidate)
                                <tr @class([
                                    'text-center hover:bg-zinc-50 dark:hover:bg-zinc-800 dark:hover:text-white',
                                    'bg-zinc-50 dark:bg-zinc-700' => $loop->odd,
                                    'bg-zinc-100 dark:bg-zinc-950' => $loop->even,
                                ])>
                                    <td>
                                        @php
                                            $index =
                                                $loop->iteration +
                                                ($candidates->currentPage() - 1) * $candidates->perPage();
                                        @endphp
                                        {{ $index }}
                                    </td>
                                    <td class=" flex justify-left items-center">
                                        <img src="{{ $candidate->profile_image
                                            ? asset('storage/' . ltrim($candidate->profile_image, '/'))
                                            : asset('images/default-profile-image.png') }}"
                                            alt="Profile" class="h-10 w-10 rounded-full object-cover mr-4" />
                                        <span>{{ $candidate->name }}</span>
                                    </td>
                                    <x-td>
                                        {{ $candidate->email }}
                                    </x-td>
                                    <x-td>
                                        {{ $candidate->jobs->count() }} Jobs
                                    </x-td>
                                    <x-td>
                                        {{ $candidate->status }}
                                    </x-td>
                                    <x-td>
                                        <div>
                                            <flux:button variant="ghost" icon="pencil"
                                                class="bg-zinc-800! hover:bg-zinc-900! text-white!"
                                                href="{{ asset(route('candidatesedit', $candidate->id)) }}">
                                            </flux:button>
                                            <flux:button variant="danger" icon="trash" type="button"
                                                class="bg-red-800! hover:bg-red-700! text-white"
                                                wire:click="delete({{ $candidate->id }})">
                                            </flux:button>
                                        </div>
                                    </x-td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="bg-gray-200 dark:bg-black font-medium px-6 py-3">
                    {{ $candidates->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

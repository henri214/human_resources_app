<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Jobs
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            List of Jobs
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
                                    Title
                                </x-th>
                                <x-th>
                                    Description
                                </x-th>
                                <x-th>
                                    Type
                                </x-th>
                                <x-th>
                                    Location
                                </x-th>

                                <x-th>
                                    Status
                                </x-th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr @class([
                                    'text-center hover:bg-zinc-50 dark:hover:bg-zinc-800 dark:hover:text-white',
                                    'bg-zinc-50 dark:bg-zinc-700' => $loop->odd,
                                    'bg-zinc-100 dark:bg-zinc-950' => $loop->even,
                                ])>
                                    <x-td>
                                        @php
                                            $index = $loop->iteration + ($jobs->currentPage() - 1) * $jobs->perPage();
                                        @endphp
                                        {{ $index }}
                                    </x-td>
                                    <x-td>
                                        <span>{{ $job->title }}</span>
                                    </x-td>
                                    <x-td>
                                        {{ Str::limit($job->description, 50) }}
                                    </x-td>
                                    <x-td>
                                        {{ $job->type }}
                                    </x-td>
                                    <x-td>
                                        {{ $job->location }}
                                    </x-td>
                                    <x-td>
                                        {{ $job->status }}
                                    </x-td>
                                    <x-td>
                                        <flux:button variant="ghost" icon="pencil"
                                            class="bg-zinc-800! hover:bg-zinc-900! text-white!"
                                            href="{{ asset(route('jobsedit', $job->id)) }}">
                                        </flux:button>
                                        <flux:button variant="danger" icon="trash" type="button"
                                            class="bg-red-800! hover:bg-red-700! text-white"
                                            wire:click="delete({{ $job->id }})">
                                        </flux:button>
                                    </x-td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-200 dark:bg-black font-medium px-6 py-3">
                    {{ $jobs->links() }}
                </div>

            </div>

        </div>
    </div>
</div>

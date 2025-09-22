<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Communications
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            List of communications
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
                                    Candidate Name
                                </x-th>
                                <x-th>
                                    Type
                                </x-th>
                                <x-th>
                                    Subject
                                </x-th>
                                <x-th>
                                    Message
                                </x-th>
                                <x-th>
                                    Sent At
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
                            @foreach ($communications as $communication)
                                <tr @class([
                                    'text-center hover:bg-zinc-50 dark:hover:bg-zinc-800 dark:hover:text-white',
                                    'bg-zinc-50 dark:bg-zinc-700' => $loop->odd,
                                    'bg-zinc-100 dark:bg-zinc-950' => $loop->even,
                                ])
                                    onclick="window.location='{{ route('communicationsshow', $communication->id) }}'">
                                    <x-td>
                                        @php
                                            $index = $loop->index + 1;
                                        @endphp
                                        {{ $index }}
                                    </x-td>
                                    <x-td>
                                        <span>{{ $communication->candidate->name }}</span>
                                    </x-td>
                                    <x-td>
                                        {{ $communication->type }}
                                    </x-td>
                                    <x-td>
                                        {{ Str::limit($communication->subject, 50) }}
                                    </x-td>
                                    <x-td>
                                        {{ Str::limit($communication->message, 50) }}
                                    </x-td>
                                    <x-td>
                                        {{ $communication->sent_at }}
                                    </x-td>
                                    <x-td>
                                        {{ $communication->status }}
                                    </x-td>
                                    <x-td>
                                        {{-- <flux:button variant="ghost" icon="pencil"
                                            class="bg-zinc-800! hover:bg-zinc-900! text-white!"
                                            href="{{ asset(route('communications', $interview->id)) }}">
                                        </flux:button>
                                        <flux:button variant="danger" icon="trash" type="button"
                                            class="bg-red-800! hover:bg-red-700! text-white"
                                            wire:click="delete({{ $communication->id }})">
                                        </flux:button> --}}
                                    </x-td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-200 dark:bg-black font-medium px-6 py-3">
                    {{ $communications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Dashboard
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            Welcome {{ auth()->user()->name }}
        </flux:subheading>
        <flux:separator></flux:separator>

        <livewire:chart :$jobStatuses :$interviewStatuses />

    </div>
</div>

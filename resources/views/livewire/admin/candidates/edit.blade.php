<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Candidate
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            Edit this candidate
        </flux:subheading>
        <flux:separator></flux:separator>
    </div>

    <form wire:submit="update" class="my-6 w-full space-y-6">
        @csrf

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Name" wire:model="candidate.name" :invalid="$errors->has('candidate.name')"
                    type="text" />
            </div>
            <div>
                <flux:input label="Email" type="email" wire:model="candidate.email"
                    :invalid="$errors->has('candidate.email')" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Phone Number" type="tel" wire:model="candidate.phone"
                    :invalid="$errors->has('candidate.phone')" />
            </div>
            <div>
                <flux:input label="Profile Image" type="file" wire:model="image" :invalid="$errors->has('image')" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                {{-- //looking,assigned, hired, archived --}}
                <flux:select label="Status" wire:model="candidate.status" :invalid="$errors->has('candidate.status')">
                    <option value="looking">Looking</option>
                    <option value="assigned">Assigned</option>
                    <option value="hired">Hired</option>
                    <option value="archived">Archived</option>
                </flux:select>
            </div>
        </div>


        <flux:button type="submit" variant="primary" class="w-full">
            Update Candidate
        </flux:button>
    </form>
</div>

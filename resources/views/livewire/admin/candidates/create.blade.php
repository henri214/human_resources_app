<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            New Candidate
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            Create a new candidate
        </flux:subheading>
        <flux:separator></flux:separator>
    </div>
    <form wire:submit='save' class="my-6 w-full space-y-6">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Name" wire:model='candidate.name' :invalid="$errors->has('candidate.name')"
                    type="text" />
            </div>
            <div>
                <flux:input label="Email" type="email" wire:model='candidate.email'
                    :invalid="$errors->has('candidate.email')" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Candidate Profile Image" wire:model='image' :invalid="$errors->has('image')"
                    type="file" />
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <flux:input label="Phone Number" type="tel" wire:model='candidate.phone'
                    :invalid="$errors->has('candidate.phone')" />
            </div>
            <div>
                <flux:select label="Status" wire:model='candidate.status' :invalid="$errors->has('candidate.status')">
                    <option value="looking">Looking</option>
                    <option value="assigned">Assigned</option>
                    <option value="hired">Hired</option>
                    <option value="archived">Archived</option>
                </flux:select>
            </div>
        </div>
        <flux:button type="submit" variant="primary">
            Create Candidate
        </flux:button>
    </form>
</div>

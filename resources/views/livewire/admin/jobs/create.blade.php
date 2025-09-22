<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            New Job
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            Create a new job
        </flux:subheading>
        <flux:separator></flux:separator>
    </div>
    <form wire:submit='save' class="my-6 w-full space-y-6">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Job Title" wire:model.live='job.title' :invalid="$errors->has('job.title')"
                    type="text" />
            </div>
            <div>
                <flux:input label="Location" type="text" wire:model.live='job.location'
                    :invalid="$errors->has('job.location')" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Job Description" wire:model.live='job.description'
                    :invalid="$errors->has('job.description')" type="textarea" />
            </div>
            <div>
                <flux:input label="Job Type" wire:model.live='job.type' :invalid="$errors->has('job.type')"
                    type="text">
                </flux:input>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:select label="Status" wire:model="job.status" :invalid="$errors->has('job.status')">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </flux:select>
            </div>
            <flux:button type="submit" variant="primary">
                Create Job
            </flux:button>
        </div>

    </form>
</div>

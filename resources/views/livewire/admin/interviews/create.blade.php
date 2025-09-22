<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            New Interview
        </flux:heading>
        <flux:subheading size="lg" class="w-full">
            Create a new Interview
        </flux:subheading>
        <flux:separator></flux:separator>
    </div>
    <form wire:submit='save' class="my-6 w-full space-y-6">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:select label="Candidate" wire:model="interview.candidate_id"
                    :invalid="$errors->has('interview.candidate_id')">
                    @foreach ($candidates as $candidate)
                        <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                    @endforeach
                </flux:select>
            </div>
            <div>
                <flux:select label="Job" wire:model="interview.job_id" :invalid="$errors->has('interview.job_id')">
                    @foreach ($jobs as $job)
                        @continue($job->status === 'open')
                        <option value="{{ $job->id }}">{{ $job->title }}</option>
                    @endforeach
                </flux:select>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input label="Scheduled at" wire:model='interview.scheduled_at'
                    :invalid="$errors->has('interview.scheduled_at')" type="date" />
            </div>
            <div>
                <flux:input label="Interview Location or Interview Link" wire:model='interview.location_or_link'
                    :invalid="$errors->has('interview.location_or_link')" type="text">
                </flux:input>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:select label="Status" wire:model="interview.status" :invalid="$errors->has('interview.status')">
                    <option value="scheduled">Scheduled</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </flux:select>
            </div>
            <flux:button type="submit" variant="primary">
                Create Job
            </flux:button>
        </div>

    </form>
</div>

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'candidate_id' => 'required|exists:candidates,id',
            'job_id' => 'nullable|exists:jobs,id',
            'scheduled_at' => 'required|date',
            'location_or_link' => 'nullable|string',
            'status' => 'required|in:scheduled,completed,canceled',
            'notes' => 'nullable|string',
        ];
    }
}

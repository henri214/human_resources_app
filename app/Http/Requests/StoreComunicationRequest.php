<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComunicationRequest extends FormRequest
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
            'type' => 'required|in:email,whatsapp',
            'subject' => 'nullable|required_if:type,email|string|max:255',
            'message' => 'required|string',
            'sent_at' => 'nullable|date',
            'status' => 'required|in:sent,failed',
        ];
    }
}

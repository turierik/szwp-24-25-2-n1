<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateHouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "address" => "required|string|min:10",
            "owner_id" => "required|integer|exists:users,id",
            "rent" => "required|decimal:0,2|min:0|max:99999",
            "size" => "required|integer|min:1|max:999",
            "image" => "nullable|file|image"
        ];
    }

    public function messages(): array
    {
        return [
            "address.required" => "A cím kitöltése kötelező.",
            "size.min" => "A méret legalább :min kell legyen."
        ];
    }
}

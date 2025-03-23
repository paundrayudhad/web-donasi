<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignDonationStoreRequest extends FormRequest
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
            //
            'amount' => 'required|numeric', // amount is required and must be numeric amount harus diisi dan harus berupa angka
            'name' => 'required|string', // name is required and must be string name harus diisi dan harus berupa string
        ];
    }
    public function messages()
    {
        return [
            'amount.required' => 'Jumlah donasi Harus diisi',
            'amount.numeric' => 'Jumlah donasi Harus berupa angka',
            'name.required' => 'Nama Harus diisi',
            'name.string' => 'Nama Harus berupa string',
        ];
    }   
}

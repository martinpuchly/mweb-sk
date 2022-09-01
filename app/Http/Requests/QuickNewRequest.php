<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuickNewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'nullable|min:3|max:50',
            'text'=>'required|min:10|max:500',
            'user_id'=>'required'
        ];
    }


     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.min' => 'Titulok novinky musí obsahovať minimálne :min znakov.',
            'title.max' => 'Titulok novinky môže obsahovať maximálne :max znakov.',
            'text.required' => 'Text novinky je povinný.',
            'text.min' => 'Text novinky  musí obsahovať minimálne :min znakov.',
            'text.max' => 'Text novinky  môže obsahovať maximálne :max znakov.',

        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id ?? 1,
        ]);
    }
}

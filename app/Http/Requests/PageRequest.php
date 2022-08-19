<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PageRequest extends FormRequest
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
            'title' => 'required|unique:pages,id,'.$this->id.'|min:5|max:255',
            'slug' => 'required|unique:pages,id,'.$this->id,
            'body' => 'required|min:20',

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
            'title.required' => 'Názov stránky je povinný.',
            'title.unique' => 'Názov stránky sa už v databáze nachádza.',
            'title.min' => 'Názov stránky musí obsahovať minimálne :min znakov.',
            'title.max' => 'Názov stránky môže obsahovať maximálne :max znakov.',
            'slug.required' => 'Url je povinný.',
            'slug.unique' => 'Url sa už v databáze nachádza.',
            'body.required' => 'Telo stránky je povinné.',
            'body.min' => 'Telo stránky musí obsahovať minimálne :min znakov.',
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
            'slug' => empty(trim($this->slug)) ? Str::slug($this->title) : trim($this->slug),
        ]);
    }
}

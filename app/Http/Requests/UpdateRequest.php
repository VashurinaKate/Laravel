<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'author' => ['nullable', 'string', 'min:2', 'max:50'],
            'image' => ['nullable', 'image', 'mimes:png,jpg'],
            'status' => ['required'],
            'description' => ['nullable', 'string'],
            'only_admin' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Вы не заполнили поле :attribute'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'наименование',
            'author' => 'автор',
            'description' => 'описание',
            'shortdescription' => 'краткое описание'
        ];
    }
}

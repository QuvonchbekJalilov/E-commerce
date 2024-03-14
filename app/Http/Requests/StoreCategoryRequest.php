<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return auth()->user()->can('category:create') || auth()->user()->hasRole('admin');
    }

    
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
}

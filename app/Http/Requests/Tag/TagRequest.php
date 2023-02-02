<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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


    protected function onCreate(): array
    {
        return [
            'name'  => 'required|string|min:3',
        ];
    }


    protected function onUpdate(): array
    {
        return [
            'name'  => 'required|string|min:3',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        switch ($this->method()) {
            case request()->isMethod('POST'):
                return $this->onCreate();
                break;

            case request()->isMethod('PUT'):
                return $this->onUpdate();
                break;

            case request()->isMethod('DELETE'):
                return $this->onDelete();
                break;

            default:
        }
    }
}

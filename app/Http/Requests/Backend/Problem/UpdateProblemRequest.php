<?php

namespace App\Http\Requests\Backend\Problem;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateProblemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return access()->hasRole(1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->request->add([
            // 'slug'    => str_slug($this->title) .'-'. str_random(6),
            'user_id' => Auth::user()->id
        ]);

        // dd($this->request->all());

        return [
            'title'           => 'required|max:191',
            'slug'            => 'unique:problems',
            'problem_code'    => 'required',
            'contest_id'      => 'required',
            'content'         => 'required',
            'sample_input'    => 'required',
            'sample_output'   => 'required',
            'is_allow_submit' => 'required',
            'is_allow_submit' => 'required',
            'label_color'     => 'required',
            'level'           => 'required',
            'time_limit'      => 'required',
            'memory_limit'    => 'required',
        ];
    }
}

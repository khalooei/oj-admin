<?php

namespace App\Http\Requests\Backend\Contest;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreContestRequest extends FormRequest
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
            'slug'    => str_slug($this->title) .'-'. str_random(6),
            'user_id' => Auth::user()->id
        ]);

        // $this->slug = str_slug($this->title) .'-'. str_random(6);
        // $this->user_id = Auth::user()->id;

        // dd($this->slug);

        return [
            'title'       => 'required|max:191',
            // 'slug'        => 'required|unique:contests',
            'slug'        => 'unique:contests',
            'description' => 'required',
            'active_at'   => 'required|date',
            'start_at'    => 'required|date',
            'freeze_at'   => 'required|date',
            'unfreeze_at' => 'required|date',
            'end_at'      => 'required|date',
        ];
    }
}

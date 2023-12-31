<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      "name" => ["required", "string", "max:20"],
      "phone" => ["nullable", "string", "min:12", "max:13", Rule::unique(User::class)->ignore($this->user()->id)],
      "github_url" => ["nullable", "string", "url:http,https", "max:255"],
      "linkedin_url" => ["nullable", "string", "url:http,https", "max:255"],
      "jabatan" => ["nullable", "min:3", "max:20"]
    ];
  }
}

//             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],

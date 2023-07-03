<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckAbsWords implements Rule
{
    private $cnt;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        if ($type=='PP') {
            $this->cnt = 65535;
        } elseif ($type=='SP') {
            $this->cnt = 250;
        } else {
            $this->cnt = 750;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cnt = count(explode(' ', strip_tags($value)));
        return $cnt <= $this->cnt;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Abstract must be less then '.$this->cnt.' words.';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class PriceSaleRule implements Rule
{
    private $price;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($price = 0)
    {
        $this->price = $price;
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
        if ($value > $this->price) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Giá giảm không được lớn hơn giá gốc';
    }
}

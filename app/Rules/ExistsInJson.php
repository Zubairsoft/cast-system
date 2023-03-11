<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsInJson implements Rule
{
    private string $table;
    private string $jsonColumn;
    private string $findBy;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $jsonColumn, $findBy)
    {
        $this->table = $table;
        $this->jsonColumn = $jsonColumn;
        $this->findBy = $findBy;
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
        $list = DB::table($this->table)->find($this->findBy);

        $lists_json = is_array(json_decode($list->{$this->jsonColumn})) ? json_decode($list->{$this->jsonColumn}) : [];

        if (!array_key_exists($value, $lists_json) && !is_null($value)) {
            
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
        return 'The validation error message.';
    }
}

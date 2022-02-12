<?php

namespace App\Exceptions;

use Exception;

class CustomerNotBelongsToBook extends Exception
{
    public function render()
    {
        return ['errors' => 'Customer not belongs to Book'];
    }
}

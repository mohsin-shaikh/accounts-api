<?php

namespace App\Exceptions;

use Exception;

class CustomerNotBelongsToBook extends Exception
{
    public function render()
    {
        return ['errors' => 'Custom not belongs to Book'];
    }
}

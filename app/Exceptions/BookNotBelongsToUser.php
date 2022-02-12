<?php

namespace App\Exceptions;

use Exception;

class BookNotBelongsToUser extends Exception
{
    public function render()
    {
        return ['errors' => 'Book not belongs to User'];
    }
}

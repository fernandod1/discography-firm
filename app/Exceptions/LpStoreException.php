<?php

namespace App\Exceptions;

use Exception;

class LpStoreException extends Exception
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render($request)
    {
        return redirect()->route('lps.index')
            ->with('error', $this->message);
    }
}

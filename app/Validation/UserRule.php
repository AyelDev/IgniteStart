<?php

namespace App\Validation;

class UserRule
{
    
    public function valid_username(string $str, string $fields = null, array $data = []): bool
    {
        return (bool) preg_match('/^[a-zA-Z\s]+$/', $str);
    }
}

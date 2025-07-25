<?php

namespace App\Validation;

class UserRule
{
    public function valid_email(string $str, string $fields = null, array $data = []): bool
    {
        return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function valid_password(string $str, string $fields = null, array $data = []): bool
    {
        return (bool) preg_match('/^(?=.*\d)(?=.*[^\w\s]).+$/', $str);

    }
}

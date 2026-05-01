<?php

namespace app;

class Validator
{
    private array $data;
    private array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function rule(string $rule, string $field, $parameter = null): self
    {
        $value = $this->data[$field] ?? null;

        if ($rule === 'required' && (!isset($value) || trim((string)$value) === '')) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " is required.";
        }

        if ($rule === 'min') {
            if (is_numeric($value)) {
                if ($value < $parameter) {
                    $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be at least {$parameter}.";
                }
            } elseif (strlen((string)$value) < $parameter) {
                $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be at least {$parameter} characters.";
            }
        }

        if ($rule === 'max') {
            if (is_numeric($value)) {
                if ($value > $parameter) {
                    $this->errors[] = "The " . str_replace('_', ' ', $field) . " must not exceed {$parameter}.";
                }
            } elseif (strlen((string)$value) > $parameter) {
                $this->errors[] = "The " . str_replace('_', ' ', $field) . " must not exceed {$parameter} characters.";
            }
        }

        if ($rule === 'email' && trim((string)$value) !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be a valid email address.";
        }

        if ($rule === 'numeric' && trim((string)$value) !== '' && !is_numeric($value)) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be a number.";
        }

        if ($rule === 'integer' && trim((string)$value) !== '' && filter_var($value, FILTER_VALIDATE_INT) === false) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be an integer.";
        }

        if ($rule === 'string' && trim((string)$value) !== '' && !is_string($value)) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be a string.";
        }

        if ($rule === 'confirmed') {
            $confirmField = $field . '_confirmation';
            if (!isset($this->data[$confirmField]) || $value !== $this->data[$confirmField]) {
                $this->errors[] = "The " . str_replace('_', ' ', $field) . " confirmation does not match.";
            }
        }

        if ($rule === 'in') {
            $allowed = explode(',', $parameter);
            if (!in_array($value, $allowed, true)) {
                $this->errors[] = "The " . str_replace('_', ' ', $field) . " must be one of: {$parameter}.";
            }
        }

        if ($rule === 'regex' && trim((string)$value) !== '' && !preg_match($parameter, $value)) {
            $this->errors[] = "The " . str_replace('_', ' ', $field) . " format is invalid.";
        }

        if ($rule === 'same') {
            if (!isset($this->data[$parameter]) || $value !== $this->data[$parameter]) {
                $this->errors[] = "The " . str_replace('_', ' ', $field) . " must match " . str_replace('_', ' ', $parameter) . ".";
            }
        }

        return $this;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}

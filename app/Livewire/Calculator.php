<?php

namespace App\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $operation = '';
    public $result = '';

    public function addToOperation($value)
    {
        $this->operation .= $value;
    }

    public function clear()
    {
        $this->operation = '';
        $this->result = '';
    }

    public function backspace()
    {
        $this->operation = substr($this->operation, 0, -1);
    }

    public function calculate()
    {
        // Validar caracteres permitidos
        if (!preg_match('/^[0-9+\-×÷\s.]+$/', $this->operation)) {
            $this->result = 'Error';
            return;
        }

        try {
            // Normalizar la expresión: eliminar espacios y reemplazar operadores
            $expression = preg_replace('/\s+/', '', str_replace(['×', '÷'], ['*', '/'], $this->operation));

            // Tokenizar números (incluye negativos) y operadores
            preg_match_all('/-?\d+(\.\d+)?|[+\/*]/', $expression, $matches);
            $tokens = $matches[0];

            if (empty($tokens)) {
                $this->result = 'Error';
                return;
            }

            // Resolver multiplicaciones y divisiones primero
            $stack = [];
            $i = 0;
            while ($i < count($tokens)) {
                $token = $tokens[$i];
                if ($token === '*' || $token === '/') {
                    $prev = array_pop($stack);
                    $next = isset($tokens[++$i]) ? floatval($tokens[$i]) : 0;
                    if ($token === '/' && $next == 0) {
                        $this->result = 'Error';
                        return;
                    }
                    $stack[] = ($token === '*') ? ($prev * $next) : ($prev / $next);
                } else {
                    $stack[] = ($token === '+' || $token === '-') ? $token : floatval($token);
                }
                $i++;
            }

            // Resolver sumas y restas
            $result = array_shift($stack);
            while (!empty($stack)) {
                $op = array_shift($stack);
                $num = array_shift($stack);
                if ($op === '+') {
                    $result += $num;
                } elseif ($op === '-') {
                    $result -= $num;
                }
            }

            $this->result = $result;
        } catch (\Throwable $e) {
            $this->result = 'Error';
        }
    }

    public function render()
    {
        return view('livewire.calculator');
    }
}

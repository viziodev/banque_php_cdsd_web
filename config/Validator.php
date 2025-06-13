<?php 
namespace App\Config;
class Validator{
    private  array  $errors=[];
    /**
     * Get the value of errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addErrors(string $key,string $error): void
    {
       $this->errors[$key]= $error;
    }

    public function isValid():bool{
       return empty($this->errors);
    }

    //Regles validites 
    public function isEmpty(string $value,string $key,string $error):bool{
        if (empty($value)) {
            $this->addErrors($key,$error);
            return true;
        }
        return false;
    }

    public function isEmail(string $value,string $key,string $error):bool{
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addErrors($key,$error);
            return false;
        }
        return true;
    }

    public function isNumber(int|float $value,string $key,string $error,int $min=10000,int $max=10000000):bool{
        if (!filter_var($value, FILTER_VALIDATE_INT,["options" => [ "min_range" => $min, "max_range" => $max]])) {
            $this->addErrors($key,$error);
            return false;
        }
        return true;
    }
}
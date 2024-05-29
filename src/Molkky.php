<?php

namespace App;

class Molkky
{
    public function getScore(array $bowlingSeries)
    {
        $isZero = 0;
        $pins = 0;
        $result = 0;
        foreach($bowlingSeries as $throw) {
                foreach($throw as $value){
                    if ( count($throw) > 1) {
                        $pins++;
                    } else {
                        if ($value === 0) {
                            $isZero++;
                        } else {
                            $isZero = 0;
                            $result += $value;
                        }
                    }
                }
            } 
        
        $result += $pins;
        $result = $this->overFifty($result);
        $result = $this->winOrLose($result, $isZero);

        // var_dump($this->overFifty($result));
        // die();

        return $result;
    }

    public function overFifty($result) {
        if ($result > 50) {
            $result = 25;
        } else {
            $result = $result;
        }
        return $result;
    }

    public function winOrLose($result, $isZero)
    {
        if ($result === 50) {
            $result = 'You win !';
            return $result;
        } elseif ($isZero === 3) {
            $result = 'You lose !';
            return $result;
        }
        return $result;
    }
}

$molkky = new Molkky();
echo $molkky->getScore([[0], [0], [5], [0]]);
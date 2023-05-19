<?php

declare(strict_types=1);


class ViewService
{


    // to move
    public static function AmountFormat(string $transAmount)
    {
        return (Transaction::toFloatStatic($transAmount) >= 0) ? "$" . $transAmount :  "- $" . trim($transAmount, '-');
    }



    /**
     * to display the color depend on the Amount if is income or expense
     *
     * @param [type] $transAmount
     * @return void
     */
    public static function color(string $transAmount)
    {
        return (Transaction::toFloatStatic($transAmount)  >= 0) ? "color:green" : "color:red";
    }
}

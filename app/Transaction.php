<?php

declare(strict_types=1);

// Your Code
// apply the solid principles 
// clean code do some modification
/**
 * read all those files in directory
 */
class Transaction
{


    /**
     * to hold the income amount
     *
     * @var float
     */
    private static float $income = 0;




    /**
     * to hold expens amount
     *
     * @var float
     */
    private static float $expens = 0;


    /**
     * file content as row 
     *
     * @var array
     */
    private $filesContent = [];


    public function __construct(string $pathDiractory)
    {
        $file = new fileServices;

        $this->filesContent = $file->getContent($pathDiractory);
    }




    /**
     * row of data 
     *
     * @return array row of data 
     */
    public  function getResult(): array
    {
        return $this->proccess($this->filesContent);
    }




    /**
     * extract transaction data, and reformat data and Amount colume
     *
     * @param array $transactionRow
     * @return array four colum of date,Check,tran, Amoun
     */
    private function ExtractTrans(array $transactionRow): array
    {
        [$date, $Check, $trans, $Amount] =  $transactionRow;


        $Amount = $this->toFloat($Amount);

        $this->calculateTotal($Amount);

        return [
            'date' => date("M d, Y", (int) strtotime($date)),
            'Check' => $Check,
            'trans' => $trans,
            'Amoun' => $Amount
        ];
    }





    /**
     * read content of file line by line and proccess the data
     *
     * @param array $filesContent
     * @return array
     */
    private function proccess(array $filesContent): array
    {

        $after = [];

        foreach ($filesContent as $line) {
            $buffer = explode(',', $line, 4);
            $after[] = $this->ExtractTrans($buffer);
        }

        return $after;
    }





    /**
     * calculate the Total for each income and expense 
     *
     * @param float $Amount
     * @return void
     */
    private function calculateTotal(float $Amount)
    {

        ($Amount > 0) ?  self::incomeTotal($Amount) : self::expenseTotal($Amount);
    }



    /**
     * to get total Income Amount
     *
     * @return float total Income Amount
     */
    public static function getIncome(): float
    {
        return self::$income;
    }




    /**
     * get the total Expense amount 
     *
     * @return total total Expense amount 
     */
    public static function getExpense(): float
    {
        return self::$expens;
    }



    /**
     * to calculate the income total
     *
     * @param float $amount
     * @return void
     */
    private static function incomeTotal(float $Amount): void
    {
        self::$income += $Amount;
    }





    /**
     * to calculate the expense Total
     *
     * @param float $amount
     * @return void
     */
    private static function expenseTotal(float $Amount): void
    {
        self::$expens -= $Amount;
    }






    /**
     * get the net Total
     *
     * @return void
     */
    public static function netTotal()
    {
        return self::$income - self::$expens;
    }





    /**
     * to get the float number from the string 
     *
     * @param string $transAmount
     * @return float return float number
     */
    private function toFloat(string $transAmount): float
    {
        return (float) str_replace(['$', ',', '"'], '', $transAmount);
    }





    /**
     * static methode to get the float number from the string 
     *
     * @param string $transAmount
     * @return float return the float number
     */
    public static function toFloatStatic(string $transAmount): float
    {
        return (float) str_replace(['$', ',', '"'], '', $transAmount);
    }
}

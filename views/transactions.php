<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction) {  ?>
                <tr>

                    <th><?= $transaction['date'] ?> </th>
                    <th><?= $transaction['Check'] ?></th>
                    <th><?= $transaction['trans'] ?></th>
                    <th style="<?= ViewService::color($transaction['Amoun']) ?>"><?= ViewService::AmountFormat($transaction['Amoun']) ?></th>
                </tr>
            <?php  } ?>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?= Transaction::getIncome() ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?= Transaction::getExpense() ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?= Transaction::netTotal() ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Transactions Table</title>
    <style>
        p {
            font-weight: bold;
            text-decoration: underline;
            font-size: x-large;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px grey solid;
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

<body style="padding: 10px;">
    <p>Transactions:</p>
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
            <?php if (!empty($transactions)) : ?>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?= formatDate($transaction['date']) ?></td>
                        <td><?= $transaction['checkNumber'] ?></td>
                        <td><?= $transaction['description'] ?></td>
                        <td>
                            <?php if ($transaction['amount'] < 0) : ?>
                                <span style="color: red;">
                                    <?= formatCurrency($transaction['amount']) ?>
                                </span>
                            <?php elseif ($transaction['amount'] > 0) : ?>
                                <span style="color: green;">
                                    <?= formatCurrency($transaction['amount']) ?>
                                </span>
                            <?php else : ?>
                                <?= formatCurrency($transaction['amount']) ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th style="font-weight: normal;" colspan="3">Total Income:</th>
                <td><?= formatCurrency($totals['totalIncome'] ?? 0) ?></td>
            </tr>
            <tr>
                <th style="font-weight: normal;" colspan="3">Total Expense:</th>
                <td><?= formatCurrency($totals['totalExpense'] ?? 0) ?></td>
            </tr>
            <tr>
                <th style="font-weight: normal;" colspan="3">Net Total:</th>
                <td><?= formatCurrency($totals['netTotal'] ?? 0) ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
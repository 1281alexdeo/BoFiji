<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h2>Transaction Summary</h2>
        <table>
            <thead>
             <tr>
                 <th>Transaction ID</th>
                 <th>To</th>
                 <th>Amount</th>
                 <th>Description</th>
             </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $transID }}</td>
                <td>{{ $receiverName }}</td>
                <td>${{ $amount }}</td>
                <td>{{ $description }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <hr>
        <p>Subtotal: ${{ $amount }}<br>Total: ${{ $amount }}</p>
        <hr>

        <br>
        <p style="Color: blue; font-weight: bold;">From our BoF team. <br>
            Thank you for banking with us.</p>

</body>
</html>
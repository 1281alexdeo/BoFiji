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

<p>Dear {{ $senderName }},</p><br><br>

<div class="text-center"><strong>Payment Confirmation</strong></div>
<br>
<p>Please check the transaction summary below and confirm it.</p>

<h4>Transaction Summary</h4>
<hr>
<table>
    <thead>
    <tr>
        <th>Transactoin ID</th>
        <th>To</th>
        <th>Amount</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $transID }}</td>
        <td>{{ $recipientName }}</td>
        <td>{{ $amount }}</td>
        <td>{{ $description }}</td>
    </tr>
    </tbody>
</table>
<hr>
<br>
<p>Please click <a href="{{ route('payexceed.confirm',['email' => $email, 'token' => $token]) }}">confirm</a> to proceed.</p><br>
<p style="Color: blue; font-weight: bold;">From our BoF team. <br>
    Thank you for banking with us.</p>
</body>
</html>

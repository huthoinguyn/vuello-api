<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
<h1>Hi, {{ $user->name }}</h1>
<p>
    We are happy to inform you that your following card has been moved to the next stage. </p>
<p>
    Here are the details: </p>
<ul>
    <li>
        <strong>Card Title:</strong> {{ $card->title }}
    </li>
    <li>
        <strong>Card Description:</strong> {{ $card->description }}
    </li>
    <li>
        <strong>New Column:</strong> {{ $column->name }}
    </li>
</ul>
<p>
    Thank you for using our application. </p>
<p>
    Regards,
    <br>
    {{ env('APP_NAME') }}
</p>
</body>

</html>

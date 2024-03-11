<!-- resources/views/punchwelcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Punch Clock</title>
</head>
<body>

    <h1>Punch Clock</h1>

    <div>
        <p><a href="{{ url('/punch-in') }}">Punch In</a></p>
        <p><a href="{{ url('/punch-out') }}">Punch Out</a></p>
        <p><a href="{{ url('/calculate-total-time') }}">Calculate Total Time</a></p>
    </div>

</body>
</html>

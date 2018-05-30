<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('room') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ url('room') }}">View All Nerds</a></li>
        <li><a href="{{ url('room/create') }}">Create a Nerd</a>
    </ul>
</nav>



    <div class="jumbotron text-center">
     
        <p>
            <strong>Room Number:</strong> {{ $room->room_number }}<br>
            <strong>Occupancy Type:</strong> {{ $room->occupancy_type }}
            <strong>Capacity:</strong> {{ $room->capacity }}
        </p>
    </div>

</div>
</body>
</html>
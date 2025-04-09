<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Your Notifications</h2>
    
        @if($notifications->isEmpty())
            <div class="alert alert-info">You have no notifications.</div>
        @else
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item {{ $notification->is_read ? '' : 'list-group-item-warning' }}">
                        <strong>{{ $notification->title }}</strong><br>
                        <span>{{ $notification->message }}</span><br>
                        <small class="text-muted">Received on {{ $notification->created_at->format('M d, Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <!-- custome js -->
   
</body>
</html>
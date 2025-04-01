<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveShare</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h1 class="text-center mb-4">Welcome to DriveShare</h1>
        <p class="text-center mb-5">A secure password management system designed to keep your sensitive information safe.</p>
        <!-- <p>{{auth()->user()}}</p> -->
        <div class="d-flex gap-3">
            <a href="#" class="btn btn-primary btn-lg">Login</a>
            <a href="#" class="btn btn-outline-primary btn-lg">Register</a>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <!-- custome js -->
    <script>
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('strength-meter');
        const strengthText = document.getElementById('password-strength-text');
        const strengthMeterSpans = strengthMeter.querySelectorAll('span');

        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;

            // Calculate password strength
            const strength = calculateStrength(password);

            // Update strength meter visuals
            updateStrengthMeter(strength);

            // Update strength text
            strengthText.innerText = getStrengthText(strength);
        });

        function calculateStrength(password) {
            let strength = 0;

            if (password.length >= 8) strength++; // Minimum length
            if (/[a-z]/.test(password)) strength++; // Lowercase letter
            if (/[A-Z]/.test(password)) strength++; // Uppercase letter
            if (/\d/.test(password)) strength++; // Number
            if (/[@$!%*?&]/.test(password)) strength++; // Special character

            return strength;
        }

        function updateStrengthMeter(strength) {
            // Reset all spans to default color
            strengthMeterSpans.forEach((span, index) => {
                span.className = '';
                if (index < strength) {
                    if (strength <= 2) {
                        span.classList.add('weak');
                    } else if (strength === 3 || strength === 4) {
                        span.classList.add('medium');
                    } else {
                        span.classList.add('strong');
                    }
                }
            });
        }

        function getStrengthText(strength) {
            if (strength <= 2) {
                return 'Weak: Use at least 8 characters with a mix of letters, numbers, and special symbols.';
            } else if (strength === 3 || strength === 4) {
                return 'Medium: Add more special characters or numbers to strengthen.';
            } else {
                return 'Strong: Good password!';
            }
        }
    </script>
</body>
</html>
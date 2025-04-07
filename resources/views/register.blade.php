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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Register</h1>
                
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Registration Form -->
                <form action="{{route('user.register.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div id="password-strength-text" class="form-text"></div>
                    <div class="strength-meter" id="strength-meter">
                        <span></span><span></span><span></span><span></span><span></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">confirmation Password</label>
                        <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm password" required>
                    </div>

                    <div class="mb-3">
                        <label for="security_answer_1" class="form-label">Security Question 1</label>
                        <input type="text" name="security_answer_1" id="security_answer_1" class="form-control" placeholder="Pet Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="security_answer_2" class="form-label">Security Question 2</label>
                        <input type="text" name="security_answer_2" id="security_answer_2" class="form-control" placeholder="Car Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="security_answer_3" class="form-label">Security Question 3</label>
                        <input type="text" name="security_answer_3" id="security_answer_3" class="form-control" placeholder="Favorite Color" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>

                <p class="text-center mt-3">
                    Already have an account? <a href="{{route('user.login')}}">Login here</a>.
                </p>
            </div>
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
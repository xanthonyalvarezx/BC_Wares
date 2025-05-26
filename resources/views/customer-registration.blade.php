<x-main-layout title="Customer Registration">
    <div class="registration-container">
        <div class="registration-card">
            <h1 class="registration-title">Create Your Account</h1>
            <p class="registration-subtitle">Join our community of shoppers</p>

            <form action="/register/customer" method="post" class="registration-form">
                @csrf
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                </div>

                <button class="registration-button" type="submit">Create Account</button>
            </form>

            <div class="registration-footer">
                Already have an account? <a href="/login">Login here</a>
            </div>
        </div>
    </div>

    <style>
        .registration-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: #a8b6a1;
        }

        .registration-card {
            background-color: var(--background-color);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .registration-title {
            font-size: 2rem;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .registration-subtitle {
            color: var(--text-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .registration-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            color: var(--text-color);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-control {
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #ffffff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(168, 182, 161, 0.1);
        }

        .registration-button {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .registration-button:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
        }

        .registration-footer {
            margin-top: 2rem;
            text-align: center;
            color: #6c757d;
        }

        .registration-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .registration-footer a:hover {
            text-decoration: underline;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .registration-container {
                padding: 1rem;
            }

            .registration-card {
                padding: 1.5rem;
            }

            .registration-title {
                font-size: 1.75rem;
            }

            .form-control {
                font-size: 16px;
            }
        }

        /* Remove validation styles */
        .form-control:invalid {
            border-color: #dee2e6;
        }

        .form-control:valid {
            border-color: #dee2e6;
        }
    </style>
</x-main-layout>

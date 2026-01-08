<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-[url('{{ asset('image/bg.jpg') }}')] bg-no-repeat bg-cover bg-center">
    <div class="flex min-h-screen justify-center items-center ml-10 mr-10">
        <div class="w-96 p-6 bg-[#ac1234] rounded-md">
            <h2 class="text-center text-3xl font-bold text-white mb-6">SIGN IN</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>

                <button type="submit" class="w-full mt-4 bg-black text-white font-semibold py-2 rounded-md">Sign in</button>

                <p class="text-white text-center">or</p>

                <a href="{{ route('google.login') }}"
                    class="flex items-center justify-center gap-2 w-full rounded-lg py-2 mt-4 bg-white hover:bg-gray-100">
                    <img src="https://developers.google.com/identity/images/g-logo.png" class="w-5 h-5">
                    <span>Login dengan Google</span>
                </a>
            </form>

            <p class="mt-6 text-center text-white text-sm">
                Not have an account?
                <a href="/register" class="text-white font-semibold">Register</a>
            </p>
        </div>
    </div>
</body>

</html>
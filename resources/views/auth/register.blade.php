<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Register</title>
</head>

<body class="min-h-screen bg-[url('{{ asset('image/bg.jpg') }}')] bg-no-repeat bg-cover bg-center">
    <div class="flex min-h-screen justify-center items-center ml-10 mr-10">
        <div class="w-96 p-6 bg-[#ac1234] rounded-md">
            <h2 class="text-center text-3xl font-bold text-white mb-6">SIGN UP</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-100">Name address</label>
                    <input id="name" type="name" name="name" required autocomplete="name"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-100">Confirm
                        Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-black placeholder-gray-400 focus:outline-indigo-500" />
                </div>
                <div class="mt-3 text-center">
                    <a class=" text-center underline text-sm text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">Already registered?
                    </a>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="w-full mt-3 bg-black text-white font-semibold py-2 rounded-md">Sign
                        up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
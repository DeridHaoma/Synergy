<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Регистрация</title>
</head>
<body class="min-h-screen bg-gray-50">
    <svg class="fixed bottom-0 fill-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,122.7C384,171,480,245,576,234.7C672,224,768,128,864,117.3C960,107,1056,181,1152,213.3C1248,245,1344,235,1392,229.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <header class="flex items-center justify-between p-6">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2">
            <svg class="h-10 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
            </svg>

            <span class="text-xl font-black text-blue-600">Synergy</span>
        </a>
        <div>
            {{-- Ссылка на вкладку входа в профиль --}}
            <a href="{{ route('login') }}" class="rounded-md bg-blue-400 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Войти</a>
        </div>
    </header>
    <main class="flex flex-col justify-center p-6 pb-12">
        <div class="mx-auto max-w-md">
            <h2 class="mt-2 text-2xl font-bold text-gray-700 sm:mt-6 sm:text-3xl">Создайте свой аккаунт</h2>
        </div>
        <div class="mx-auto mt-6 w-full max-w-xl rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
            {{-- Форма регистрации --}}
            <form action="{{ route('register') }}" method="post" autocomplete="off">
                @csrf

                {{-- Полное имя --}}
                <div class="mb-6">
                    <div class="flex">
                        <div class="mr-1 w-1/3">
                            <label for="name" class="block text-lg font-medium text-gray-600">Полное имя</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input type="text" id="surname" name="surname" value="{{ old('surname') }}" autofocus required class="w-full rounded-md pl-3 text-sm {{ $errors->has('surname') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Иванов" />
                            </div>
                        </div>
                        <div class="mr-1 w-1/3">
                            <div class="rounded-md shadow-sm mt-8">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('name') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Иван" />
                            </div>
                        </div>
                        <div class="mr-1 w-1/3">
                            <div class="rounded-md shadow-sm mt-8">
                                <input type="text" id="patronymic" name="patronymic" value="{{ old('patronymic') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('patronymic') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Иванович" />
                            </div>
                        </div>
                    </div>
                    @if($errors->has('name') | $errors->has('surname') | $errors->has('patronymic'))
                        <p class="mt-2 text-sm text-red-600">Неправильно введены данные!</p>
                    @endif
                </div>

                {{-- Серия и номер паспорта --}}
                <div class="flex mb-6">
                    <div class="mr-1 w-1/2">
                        <label for="series" class="block text-lg font-medium text-gray-600">Серия и номер паспорта</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="text" id="series" name="series" value="{{ old('series') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('series') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="XXXXYYYYYY" />
                        </div>
                        @error('series')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mr-1 w-1/2">
                        <label for="date" class="block text-lg font-medium text-gray-600">Дата выдачи паспорта</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('date') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400' }}"/>
                        </div>
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Место выдачи паспорта --}}
                <div class="mb-6">
                    <label for="place" class="block text-lg font-medium text-gray-600">Место выдачи паспорта</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input type="text" id="place" name="place" value="{{ old('place') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('place') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="г. Балхаш, ЦОН" />
                    </div>
                    @error('place')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Логин и почта --}}
                <div class="flex mb-6">
                    <div class="mr-1 w-1/2">
                        <label for="login" class="block text-lg font-medium text-gray-600">Логин</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="text" id="login" name="login" value="{{ old('login') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('login') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Логин" />
                        </div>
                        @error('login')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="email" class="block text-lg font-medium text-gray-600">Почта</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('email') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Ivanov@example.com" />
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Пароль и подтверждение пароля --}}
                <div class="flex mb-6">
                    <div class="mr-1 w-1/2">
                        <label for="password" class="block text-lg font-medium text-gray-600">Пароль</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="password" id="password" name="password" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('password') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Минимум 8 символов" />
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="password_confirmation" class="block text-lg font-medium text-gray-600">Подтверждение</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full rounded-md pl-3 text-sm {{ $errors->has('password_confirmation') ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-blue-400 focus:ring-blue-500 placeholder:text-gray-400' }}" placeholder="Минимум 8 символов" />
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Регистраниция профиля --}}
                <div class="flex justify-center">
                    <button type="submit" class="flex w-1/2 items-center justify-center rounded-md bg-blue-400 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-500 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Зарегистрироваться</button>
                </div>

            </form>

            {{-- Ссылка на вкладку входа в профиль --}}
            <div class="mt-3 flex items-center justify-center">
                <a href="{{ route('login') }}" class="text-base font-medium text-blue-400 hover:text-blue-500">У вас уже есть аккаунт?</a>
            </div>

        </div>
    </main>
</body>
</html>

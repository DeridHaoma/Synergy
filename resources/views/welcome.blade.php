<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Главная</title>
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
{{--         Ссылки для регистрации, авторизации или профиля--}}
        @guest()
            <a href="{{ route('login') }}" class="rounded-md bg-blue-400 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Войти</a>
            <a href="{{ route('register') }}" class="rounded-md bg-blue-400 ml-1 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Регистрация</a>
        @endguest
        @auth()
            <a href="{{ route('profile') }}" class="rounded-md bg-blue-400 ml-1 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Профиль</a>
        @endauth()
    </div>
</header>
<main class="flex flex-col justify-center p-6 pb-12">
    @guest()
        <div class="mx-auto">
            <h2 class="mt-2 text-2xl font-bold text-gray-700 sm:mt-6 sm:text-3xl"> Для просмотра информации необходима авторизация! </h2>
        </div>
    @endguest
    @auth()
        <div class="mx-auto max-w-md">
            <h2 class="mt-2 text-2xl font-bold text-gray-700 sm:mt-6 sm:text-3xl"> Добро пожаловать, {{ Auth::user()->name }}! </h2>
        </div>
        <div class="mx-auto">
            <h3 class=" mt-2 text-xl font-medium text-blue-400 sm:mt-6 sm:text-xl"> Перейдите на вкладку "профиль", чтобы просмотреть свой личный кабинет! </h3>
        </div>
        <div class="mx-auto mt-6 w-full max-w-xl rounded-xl bg-white/80 shadow-xl backdrop-blur-xl p-6">
            <p class="text-lg font-medium text-gray-700">Данный проект был специально разработан для кадрового резерва "Synegy".

            Хотел отметить, что на странице изменения профиля Логин, Почта и Пароль были выведены в отдельные кнопки. После изменения какой-либо информации, валидация ругалась на то, что такой логин или почта уже существует. Я решил обойти эту систему так, что если пользователь хочет изменить именно логин или почту, то нужно перейти на отдельную вкладку на сайте. База данных была использованна mysql, для работы почты был использован mailtrap.
            </p>
        </div>
    @endauth
</main>
</body>
</html>

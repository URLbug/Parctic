<!DOCTYPE html>
<html>
<head>
 <title>Registration Form</title>
 <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
    <body>
        <div class="container">
        <h2>Форма регестрации абиритуриента</h2>
            <form action="/" method="POST">
                @csrf

                <label for="fname">Имя:</label><br>
                <input type="text" id="fname" name="fname" required><br>
                <label for="lname">Фамилия:</label><br>
                <input type="text" id="lname" name="lname" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="pwd">Пароль:</label><br>
                <input type="password" id="pwd" name="pwd" required><br>
                <label for="cpwd">Подтверждение пароля:</label><br>
                <input type="password" id="cpwd" name="cpwd" required><br>
                <input type="submit" value="Зарегестрировать">
            </form>
            <br>
            @if($errors->any())
                <div style="color: red">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div style="color: green">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="pr-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login | SisCad</title>
</head>

<body>
    <header>
        <div class="logo">
            <span class="purple-letter">S</span>is<span class="purple-letter">C</span>ad
        </div>
    </header>

    <main>
        <div class="main-box">
            <h1>Login</h1>
            <form action="acoes/validacaoLogin.php" method="post">
                <div class="input-group">
                        <label>
                            E-mail<br />
                            <input type="email" required name="email" placeholder="seuemail@email.com">
                        </label>
                        <label>
                            Senha<br />
                            <input type="password" required name="senha">
                        </label>
                </div>
                <div class="main-links">
                    <button class="button" type="submit">Login</button>
                    <a class="button" href="index.php">Voltar</a>
                </div>
            </form>
        </div>
    </main>

    <footer>SisCad - Todos os direitos reservados<div>Robert Moraes <span class="purple-letter">2023</span></div>
    </footer>
</body>

</html>
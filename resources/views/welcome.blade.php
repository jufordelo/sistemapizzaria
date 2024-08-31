<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itália Express</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #d32f2f;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            text-align: center;
            margin-top: 20px;
        }
        nav a {
            background-color: #d32f2f;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #9a0007;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .image-container img {
            max-width: 300px;
            margin: 10px;
            border-radius: 10px;
        }
        footer {
            background-color: #d32f2f;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bem-vindo à Itália Express</h1>
        <p>A melhor pizza italiana na sua mesa!</p>
    </header>

    <nav>
        <a href="{{url('encomenda/create')}}">Encomenda</a>
        <a href="{{url('reserva/create')}}">Reserva</a>
        <a href="{{url('sugestao/create')}}">Sugestão</a>
        <a href="{{url('')}}">extra</a>
    </nav>

    <div class="container">
        <div class="image-container">
            <img src="https://s3images.coroflot.com/user_files/individual_files/large_803644_gzvljcnmxevfyn02ch6bnsjr9.jpg" alt="Pizza Especialidade 1">
            <img src="https://casaeconstrucao.org/wp-content/uploads/2021/05/15-ideia-para-propaganda-de-pizza.jpg" alt="Pizza Especialidade 2">
            <img src="https://tse4.mm.bing.net/th?id=OIP.qpBtjgNyXw7h9WryKr3PxAHaDu&pid=Api&P=0&h=180" alt="Pizza Especialidade 3">
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Itália Express - Todos os direitos reservados</p>
    </footer>
</body>
</html>

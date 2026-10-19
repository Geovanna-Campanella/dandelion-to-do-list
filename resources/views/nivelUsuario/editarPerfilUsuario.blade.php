<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar perfil | Dandelion</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfilUsuario.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>

<body>

    <div class="layout">

        @include('nivelDashboard.sidebar')

        <main class="conteudo">
            <div class="perfil-container">

                <header class="perfil-cabecalho">

                    <a href="/perfilUsuario" class="perfil-voltar">
                        <span>←</span>
                        Voltar ao meu perfil
                    </a>

                    <span class="perfil-etiqueta">SEUS DADOS, DO SEU JEITO</span>

                    <h1>Editar perfil<span>.</span></h1>

                    <p>
                        Mantenha suas informações atualizadas.
                    </p>

                </header>

                <section class="perfil-card perfil-edicao-card">

                    <div class="perfil-form-titulo">
                        <span class="perfil-form-flor">✿</span>

                        <div>
                            <h2>Seus dados pessoais</h2>
                            <p>Altere as informações que desejar.</p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="perfil-erros">
                            <strong>Não foi possível salvar as alterações.</strong>

                            <ul>
                                @foreach ($errors->all() as $erro)
                                    <li>{{ $erro }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/atualizarUsuario" method="POST" class="perfil-form">
                        @csrf
                        @method('PUT')

                        <div class="perfil-campo">
                            <label for="nome">Nome completo</label>

                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                value="{{ old('nome', $usuario->nome) }}"
                                autocomplete="name"
                                placeholder="Seu nome completo"
                                required
                            >
                        </div>

                        <div class="perfil-campo">
                            <label for="email">E-mail</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $usuario->email) }}"
                                autocomplete="email"
                                placeholder="voce@exemplo.com"
                                required
                            >
                        </div>

                        <div class="perfil-campo">
                            <label for="senha">
                                Nova senha
                                <span class="perfil-opcional">Opcional</span>
                            </label>

                            <input
                                type="password"
                                id="senha"
                                name="senha"
                                autocomplete="new-password"
                                placeholder="Digite apenas se quiser trocar a senha"
                            >

                            <p class="perfil-ajuda">
                                Deixe esse campo vazio para manter sua senha atual.
                            </p>
                        </div>

                        <div class="perfil-acoes perfil-form-acoes">

                            <a href="/perfilUsuario" class="perfil-botao-secundario">
                                Cancelar
                            </a>

                            <button type="submit" class="perfil-botao-principal">
                                Salvar alterações
                                <span>✓</span>
                            </button>

                        </div>
                    </form>

                </section>

                <p class="perfil-rodape">
                    <span>✿</span>
                    Cultive seus planos. Floresça no seu tempo.
                </p>

            </div>
        </main>

    </div>

</body>
</html>
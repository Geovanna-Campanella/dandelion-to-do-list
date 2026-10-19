<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu perfil | Dandelion</title>

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

                <!-- Cabeçalho -->
                <header class="perfil-cabecalho">

                    <span class="perfil-etiqueta">SEU ESPAÇO</span>

                    <h1>Meu perfil<span>.</span></h1>

                    <p>
                        Um cantinho para cuidar dos seus dados e da sua conta.
                    </p>

                </header>

                <!-- Cartão do perfil -->
                <section class="perfil-card">

                    <div class="perfil-apresentacao">

                        <div class="perfil-avatar">
                            {{ mb_strtoupper(mb_substr(trim($usuario->nome), 0, 1, 'UTF-8'), 'UTF-8') }}
                        </div>

                        <div class="perfil-identidade">

                            <span class="perfil-tipo">
                                <span class="perfil-flor">✿</span>
                                MEU DANDELION
                            </span>

                            <h2>{{ $usuario->nome }}</h2>

                            <p>{{ $usuario->email }}</p>

                        </div>

                    </div>

                    <div class="perfil-detalhes">

                        <div class="perfil-detalhes-titulo">
                            <h3>Informações da conta</h3>
                            <span>Seus dados pessoais</span>
                        </div>

                        <div class="perfil-dado">
                            <span class="perfil-dado-icone">♡</span>

                            <div class="perfil-dado-texto">
                                <span class="perfil-dado-label">Nome completo</span>
                                <p>{{ $usuario->nome }}</p>
                            </div>
                        </div>

                        <div class="perfil-dado">
                            <span class="perfil-dado-icone">✉</span>

                            <div class="perfil-dado-texto">
                                <span class="perfil-dado-label">E-mail</span>
                                <p>{{ $usuario->email }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="perfil-acoes">

                        <a href="/dashboard" class="perfil-botao-secundario">
                            Voltar às tarefas
                        </a>

                        <a href="/perfilUsuario/editar" class="perfil-botao-principal">
                            Editar meus dados
                            <span>↗</span>
                        </a>

                    </div>

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
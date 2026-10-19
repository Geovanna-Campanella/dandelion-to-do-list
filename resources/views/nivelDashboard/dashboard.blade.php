<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minhas tarefas | Dandelion</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>

<body>

    <div class="layout">

        @include('nivelDashboard.sidebar')

        <main class="conteudo">
            <div class="dashboard-container">

                <!-- Cabeçalho -->
                <header class="header">

                    <h1 class="Title">
                        Olá, {{ $usuario->nome }}!
                    </h1>

                    @php
                        $dataAtual = now('America/Sao_Paulo')->locale('pt_BR');
                    @endphp

                    <p class="subTitle">
                        {{ mb_strtoupper(
                            $dataAtual->translatedFormat('l, d \d\e F'),
                            'UTF-8'
                        ) }}
                    </p>

                    <hr class="header-divider">

                </header>

                <!-- Lista de tarefas -->
                <section class="tarefas">

                    <div class="tarefas-header">
                        <h2>Minhas tarefas</h2>

                        <a href="/tarefa" class="cadastrar-tarefa">
                            <span class="cadastrar-icone">+</span>
                            Cadastrar tarefa
                        </a>
                    </div>

                    <div class="tarefas-lista">

                        @forelse ($tarefas as $tarefa)

                            <article class="tarefa">

                                <!-- Informações principais -->
                                <div class="tarefa-conteudo">

                                    <h3>{{ $tarefa->titulo }}</h3>

                                    <p class="tarefa-descricao">
                                        {{ $tarefa->descricao }}
                                    </p>

                                    <p class="tarefa-status">
                                        <span class="status-ponto"></span>
                                        {{ ucfirst($tarefa->status) }}
                                    </p>

                                </div>

                                <!-- Prioridade, prazo e ações -->
                                <div class="tarefa-lateral">

                                    <span class="tarefa-etiqueta">
                                        {{ ucfirst($tarefa->prioridade) }}
                                    </span>

                                    @if ($tarefa->data_termino)

                                        <time
                                            class="tarefa-data"
                                            datetime="{{ \Carbon\Carbon::parse($tarefa->data_termino)->format('Y-m-d') }}">

                                            <span class="data-icone">◷</span>

                                            Termina em
                                            {{ \Carbon\Carbon::parse($tarefa->data_termino)->format('d/m/Y') }}

                                        </time>

                                    @endif

                                    <div class="tarefa-acoes">

                                        <a
                                            href="/tarefas/{{ $tarefa->id }}/editar"
                                            class="tarefa-editar">

                                            Editar
                                        </a>

                                        <form
                                            action="/excluirTarefa/{{ $tarefa->id }}"
                                            method="POST"
                                            onsubmit="return confirm('Deseja excluir esta tarefa?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="tarefa-excluir">

                                                Excluir
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </article>

                        @empty

                            <div class="tarefas-vazio">
                                <span class="vazio-flor">✿</span>

                                <p>Você ainda não tem tarefas cadastradas.</p>
                            </div>

                        @endforelse

                    </div>

                </section>

            </div>
        </main>

    </div>

</body>
</html>
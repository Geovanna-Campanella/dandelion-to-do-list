<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar tarefa | Dandelion</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastrarTarefa.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>

<body>

    <div class="layout">

        @include('nivelDashboard.sidebar')

        <main class="conteudo">
            <div class="pagina-tarefa">

                <!-- Cabeçalho -->
                <header class="pagina-cabecalho">

                    <a href="/dashboard" class="voltar-dashboard">
                        <span>←</span>
                        Voltar às tarefas
                    </a>

                    <div class="titulo-area">

                        <span class="titulo-etiqueta">
                            UM NOVO AJUSTE
                        </span>

                        <h1>Editar tarefa<span>.</span></h1>

                        <p>
                            Pequenos ajustes também fazem parte do progresso.
                        </p>

                    </div>

                </header>

                <!-- Formulário -->
                <section class="form-card">

                    <div class="form-card-heading">

                        <span class="form-flor">✿</span>

                        <div>
                            <h2>Detalhes da tarefa</h2>
                            <p>Atualize as informações da sua tarefa.</p>
                        </div>

                    </div>

                    <!-- Erros de validação -->
                    @if ($errors->any())
                        <div class="erros-validacao">

                            <span class="erro-icone">!</span>

                            <div>
                                <p class="erro-titulo">
                                    Confira as informações
                                </p>

                                <ul>
                                    @foreach ($errors->all() as $erro)
                                        <li>{{ $erro }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endif

                    <form
                        action="/editarTarefa/{{ $tarefa->id }}"
                        method="POST"
                        class="task-form">

                        @csrf
                        @method('PUT')

                        <!-- Título -->
                        <div class="campo campo-completo">

                            <label for="titulo">Título da tarefa</label>

                            <input
                                type="text"
                                id="titulo"
                                name="titulo"
                                value="{{ old('titulo', $tarefa->titulo) }}"
                                placeholder="Ex.: Estudar para a prova"
                                required
                            >

                        </div>

                        <!-- Descrição -->
                        <div class="campo campo-completo">

                            <label for="descricao">Descrição</label>

                            <textarea
                                id="descricao"
                                name="descricao"
                                rows="4"
                                placeholder="Adicione detalhes sobre essa tarefa..."
                                required
                            >{{ old('descricao', $tarefa->descricao) }}</textarea>

                        </div>

                        <!-- Data de início -->
                        <div class="campo">

                            <label for="dataInicio">Data de início</label>

                            <input
                                type="date"
                                id="dataInicio"
                                name="dataInicio"
                                value="{{ old('dataInicio', $tarefa->dataInicio ? \Carbon\Carbon::parse($tarefa->dataInicio)->format('Y-m-d') : '') }}"
                                required
                            >

                        </div>

                        <!-- Data de término -->
                        <div class="campo">

                            <label for="dataTermino">Data de término</label>

                            <input
                                type="date"
                                id="dataTermino"
                                name="dataTermino"
                                value="{{ old('dataTermino', $tarefa->dataTermino ? \Carbon\Carbon::parse($tarefa->dataTermino)->format('Y-m-d') : '') }}"
                                required
                            >

                        </div>

                        <!-- Status -->
                        @php
                            $statusAtual = old('status', $tarefa->status);

                            if ($statusAtual === 'Em Andamento') {
                                $statusAtual = 'Andamento';
                            }
                        @endphp

                        <div class="campo">

                            <label for="status">Status</label>

                            <select id="status" name="status" required>

                                <option
                                    value="Pendente"
                                    {{ $statusAtual == 'Pendente' ? 'selected' : '' }}>
                                    Pendente
                                </option>

                                <option
                                    value="Andamento"
                                    {{ $statusAtual == 'Andamento' ? 'selected' : '' }}>
                                    Em andamento
                                </option>

                                <option
                                    value="Concluída"
                                    {{ $statusAtual == 'Concluída' ? 'selected' : '' }}>
                                    Concluída
                                </option>

                            </select>

                        </div>

                        <!-- Prioridade -->
                        <div class="campo">

                            <label for="prioridade">Prioridade</label>

                            <select
                                id="prioridade"
                                name="prioridade"
                                required>

                                <option
                                    value="Baixa"
                                    {{ old('prioridade', $tarefa->prioridade) == 'Baixa' ? 'selected' : '' }}>
                                    Baixa
                                </option>

                                <option
                                    value="Média"
                                    {{ old('prioridade', $tarefa->prioridade) == 'Média' ? 'selected' : '' }}>
                                    Média
                                </option>

                                <option
                                    value="Alta"
                                    {{ old('prioridade', $tarefa->prioridade) == 'Alta' ? 'selected' : '' }}>
                                    Alta
                                </option>

                            </select>

                        </div>

                        <!-- Categoria -->
                        <div class="campo campo-completo">

                            <label for="categoria">Categoria</label>

                            <input
                                type="text"
                                id="categoria"
                                name="categoria"
                                value="{{ old('categoria', $tarefa->categoria) }}"
                                placeholder="Ex.: Estudos, trabalho, pessoal..."
                                required
                            >

                        </div>

                        <!-- Ações -->
                        <div class="form-acoes campo-completo">

                            <a href="/dashboard" class="botao-cancelar">
                                Cancelar
                            </a>

                            <button type="submit" class="botao-salvar">
                                <span>✓</span>
                                Salvar alterações
                            </button>

                        </div>

                    </form>

                </section>

                <p class="pagina-rodape">
                    <span>✿</span>
                    Cultive seus planos. Floresça no seu tempo.
                </p>

            </div>
        </main>

    </div>

</body>
</html>
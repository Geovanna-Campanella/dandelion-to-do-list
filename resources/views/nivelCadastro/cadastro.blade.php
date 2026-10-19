
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criar conta | Dandelion</title>

    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <main class="login-page">

        <!-- Painel de apresentação -->
        <section class="welcome-panel">

            <a href="/" class="brand">
                <span class="brand-icon">✿</span>
                <span>dandelion<span class="brand-dot">.</span></span>
            </a>

            <div class="welcome-content">
                <span class="eyebrow">
                    <span class="eyebrow-line"></span>
                    UM NOVO COMEÇO
                </span>

                <h1>
                    Toda grande<br>
                    mudança começa<br>
                    com uma <span>pequena semente.</span>
                </h1>

                <p class="welcome-description">
                    Crie seu espaço, organize suas ideias e transforme
                    seus planos em pequenas conquistas diárias.
                    Seu florescimento começa aqui.
                </p>

                <div class="feature-list">

                    <div class="feature-card">
                        <div class="feature-icon">✧</div>

                        <div class="feature-text">
                            <h3>Seu espaço, suas regras</h3>
                            <p>Uma rotina organizada do seu jeitinho.</p>
                        </div>

                        <span class="feature-arrow">↗</span>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">❀</div>

                        <div class="feature-text">
                            <h3>Um passo de cada vez</h3>
                            <p>Pequenas tarefas também são conquistas.</p>
                        </div>

                        <span class="feature-arrow">↗</span>
                    </div>

                </div>
            </div>

            <div class="flower flower-one">✿</div>
            <div class="flower flower-two">✽</div>
            <div class="flower flower-three">✿</div>

            <footer class="welcome-footer">
                <span>feito com carinho, para florescer 🌼</span>
                <span>© Dandelion</span>
            </footer>

        </section>

        <!-- Painel do formulário -->
        <section class="form-panel">

            <div class="form-container">

                <div class="mobile-brand">
                    <span class="brand-icon">✿</span>
                    <span>dandelion<span class="brand-dot">.</span></span>
                </div>

                <div class="form-heading">
                    <span class="form-tag">VAMOS COMEÇAR?</span>

                    <h2>Crie sua conta<span>.</span></h2>

                    <p>
                        Um pequeno passo hoje pode transformar
                        toda a sua rotina.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/cadastrarUsuario" method="POST">
                    @csrf

                    <div class="input-group">
                        <label for="nome">Como podemos te chamar?</label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Seu nome completo"
                            value="{{ old('nome') }}"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label for="email">E-mail</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="voce@exemplo.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label for="senha">Crie uma senha</label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Escolha uma senha segura"
                            autocomplete="new-password"
                            required
                        >

                        <span class="input-hint">
                            Escolha uma senha que você ainda não utiliza em outros sites.
                        </span>
                    </div>

                    <button type="submit" class="submit-button">
                        Criar minha conta
                        <span>↗</span>
                    </button>

                </form>

                <div class="form-divider">
                    <span></span>
                    <p>já faz parte do Dandelion?</p>
                    <span></span>
                </div>

                <a href="/" class="login-link">
                    Entrar na minha conta
                </a>

                <p class="form-footer">
                    Cultive seus planos. Floresça no seu tempo.
                    <span>✿</span>
                </p>

            </div>

        </section>

    </main>

</body>
</html>
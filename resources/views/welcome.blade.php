
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Entrar | Dandelion</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>

<body>
    <main class="login-page">

        <!-- PAINEL ESQUERDO -->
        <section class="welcome-panel">

            <header class="brand">
                <span class="brand-icon">✿</span>
                <span>dandelion<span class="brand-dot">.</span></span>
            </header>

            <div class="welcome-content">
                <span class="eyebrow">
                    SEU ESPAÇO DE ORGANIZAÇÃO
                </span>

                <h1>
                    Pequenos passos.<br>
                    <span>Grandes florescimentos.</span>
                </h1>

                <p class="welcome-description">
                    Organize sua rotina com leveza, acompanhe seu progresso
                    e transforme seus planos em pequenas conquistas diárias.
                </p>

                <div class="feature-list">

                    <article class="feature-card">
                        <div class="feature-icon icon-yellow">
                            <span>✳</span>
                        </div>

                        <div>
                            <h3>Uma rotina mais leve</h3>
                            <p>Reúna suas tarefas em um só lugar.</p>
                        </div>

                        <span class="feature-arrow">↗</span>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon icon-green">
                            <span>✓</span>
                        </div>

                        <div>
                            <h3>Progresso visível</h3>
                            <p>Valorize cada etapa concluída.</p>
                        </div>

                        <span class="feature-arrow">↗</span>
                    </article>

                </div>
            </div>

            <!-- CARTÃO FLUTUANTE -->
            <div class="progress-card">
                <div class="progress-top">
                    <div>
                        <span class="card-label">SEU PROGRESSO</span>
                        <h3>Semana em foco</h3>
                    </div>

                    <span class="progress-symbol">✿</span>
                </div>

                <div class="progress-info">
                    <strong>78%</strong>
                    <span>do seu objetivo</span>
                </div>

                <div class="progress-track">
                    <div class="progress-fill"></div>
                </div>

                <p class="progress-message">
                    Cada pequena conquista conta.
                </p>
            </div>

            <div class="flower flower-one">✿</div>
            <div class="flower flower-two">✳</div>
            <div class="flower flower-three">✿</div>

            <footer class="welcome-footer">
                Cultive sua rotina, um dia de cada vez.
            </footer>

        </section>


        <!-- PAINEL DIREITO -->
        <section class="form-panel">

            <div class="mobile-brand">
                <span class="brand-icon">✿</span>
                <span>dandelion<span class="brand-dot">.</span></span>
            </div>

            <div class="form-container">

                <div class="form-heading">
                    <span class="eyebrow">BEM-VINDA DE VOLTA</span>

                    <h2>Que bom ter você aqui.</h2>

                    <p>
                        Entre na sua conta e continue de onde parou.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="form-error" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/fazerLogin">
                    @csrf

                    <div class="field">
                        <label for="email">E-mail</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="voce@exemplo.com"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="senha">Senha</label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <div class="form-options">
                        <span>Seus planos esperam por você ✿</span>
                    </div>

                    <button class="btn-primary" type="submit">
                        Entrar na minha conta
                        <span aria-hidden="true">→</span>
                    </button>
                </form>

                <div class="form-divider">
                    <span></span>
                    <span>UM NOVO COMEÇO</span>
                    <span></span>
                </div>

                <div class="register-box">
                    <p>Ainda não tem uma conta?</p>

                    <a href="/cadastro" class="register-link">
                        Crie sua conta gratuitamente
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>

            </div>

            <footer class="form-footer">
                <span>© {{ date('Y') }} Dandelion</span>
                <span>Feito para florescer no seu ritmo.</span>
            </footer>

        </section>

    </main>
</body>
</html>

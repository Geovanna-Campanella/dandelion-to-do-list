<aside class="sidebar">

    <!-- Logo -->
    <div class="sidebar-header">
        <a href="/dashboard" class="sidebar-logo">
            <span class="sidebar-logo-icon">✿</span>

            <span class="sidebar-logo-name">
                dandelion<span class="logo-dot">.</span>
            </span>
        </a>

        <p class="sidebar-subtitle">cultive sua rotina</p>
    </div>

    <!-- Navegação -->
    <nav class="sidebar-navigation">

        <span class="sidebar-section-title">MENU PRINCIPAL</span>

        <div class="sidebar-links">

            <a href="/dashboard"
               class="{{ request()->is('dashboard', 'tarefa', 'tarefas/*/editar') ? 'active' : '' }}">

                <span class="sidebar-link-icon">⌂</span>
                <span class="sidebar-link-text">Dashboard</span>
                <span class="sidebar-link-arrow">↗</span>
            </a>

            <a href="/perfilUsuario"
               class="{{ request()->is('perfilUsuario', 'perfilUsuario/editar') ? 'active' : '' }}">

                <span class="sidebar-link-icon">♡</span>
                <span class="sidebar-link-text">Meu perfil</span>
                <span class="sidebar-link-arrow">↗</span>
            </a>

        </div>
    </nav>

    <!-- Rodapé -->
    <div class="sidebar-bottom">

        <div class="sidebar-note">
            <span class="sidebar-note-flower">✿</span>

            <p class="sidebar-note-title">Floresça no seu tempo</p>

            <p class="sidebar-note-text">
                Pequenos passos também são grandes conquistas.
            </p>
        </div>

        <form action="/fazerLogout" method="POST" class="sidebar-logout">
            @csrf

            <button type="submit">
                <span class="logout-icon">↗</span>
                <span>Sair da conta</span>
            </button>
        </form>

        <p class="sidebar-version">FEITO COM CARINHO · DANDELION</p>

    </div>

</aside>
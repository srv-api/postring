<style>
    .topbar {
        height: 76px;

        background: var(--white);

        border-bottom: 1px solid var(--border);

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 32px;

        position: sticky;

        top: 0;

        z-index: 50;
    }

    .page-title h1 {
        font-size: 19px;
        font-weight: 800;

        letter-spacing: -.5px;
    }

    .page-title p {
        margin-top: 4px;

        color: var(--gray-3);

        font-size: 10px;
    }

    .user-area {
        display: flex;
        align-items: center;

        gap: 13px;
    }

    .user-info {
        text-align: right;
    }

    .user-name {
        color: var(--gray-1);

        font-size: 11px;
        font-weight: 700;
    }

    .user-role {
        margin-top: 3px;

        color: var(--gray-3);

        font-size: 9px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: var(--primary-light);

        color: var(--primary);

        font-size: 15px;
        font-weight: 800;
    }
</style>

<header class="topbar">

    <div class="page-title">

        <h1>
            @yield('page-title', 'Dashboard')
        </h1>

        <p>
            @yield(
                'page-description',
                'Ringkasan aktivitas merchant kamu'
            )
        </p>

    </div>


    <div class="user-area">

        <div class="user-info">

            <div class="user-name">
                {{ $user->name }}
            </div>

            <div class="user-role">
                Owner
            </div>

        </div>

        <div class="user-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

    </div>

</header>
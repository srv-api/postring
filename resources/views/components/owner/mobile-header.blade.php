<div class="mobile-header">

    <a
        href="{{ route('dashboard.owner', ['idmerchant' => $merchant['idmerchant']]) }}"
        class="mobile-brand"
    >

        <img
            src="{{ asset('tr.png') }}"
            alt="Tring.id"
        >

        <span>
            Tring POS
        </span>

    </a>


    <div class="user-avatar">

        {{ strtoupper(substr($user->name, 0, 1)) }}

    </div>

</div>

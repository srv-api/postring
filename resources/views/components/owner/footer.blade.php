<style>
    .pos-footer {
        padding: 18px 32px;

        background: var(--white);

        border-top: 1px solid var(--border);

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        color: var(--gray-3);

        font-size: 9px;
    }

    .pos-footer strong {
        color: var(--gray-2);

        font-weight: 700;
    }

    @media (max-width: 550px) {

        .pos-footer {
            padding: 16px 15px;

            flex-direction: column;

            align-items: flex-start;

            gap: 5px;
        }

    }
</style>

<footer class="pos-footer">

    <div>
        © {{ date('Y') }}
        <strong>Tring.id</strong>.
        All rights reserved.
    </div>

    <div>
        Tring POS
    </div>

</footer>


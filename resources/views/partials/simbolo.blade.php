{{-- Símbolo do Santuário (manto e coroa de Nossa Senhora Aparecida)
     Uso: @include('partials.simbolo', ['classe' => 'marca__simbolo']) --}}
<svg class="{{ $classe ?? '' }}" viewBox="0 0 48 48" aria-hidden="true">
    <defs>
        <linearGradient id="ouro-simbolo" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#e8ca85"/>
            <stop offset="1" stop-color="#b18430"/>
        </linearGradient>
    </defs>
    <path fill="url(#ouro-simbolo)" d="M17.5 12.5 16 5.5l4 3 4-5 4 5 4-3-1.5 7Z"/>
    <path fill="url(#ouro-simbolo)" fill-rule="evenodd" d="M24 13.5c-4.5 0-6.400 3.500-7.400 7.500C14.600 29 10.800 37 7 42.500c5 2.100 11 3 17 3s12-.9 17-3C37.200 37 33.400 29 31.400 21c-1-4-2.900-7.500-7.400-7.500Zm0 3.400a3.100 3.600 0 1 0 .001 0Z"/>
</svg>

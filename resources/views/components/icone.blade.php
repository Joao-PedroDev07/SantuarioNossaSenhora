{{-- Ícones do site em SVG.
     Uso: <x-icone nome="relogio" />
     Para criar um ícone novo, acrescente um @case abaixo. --}}
@props(['nome'])

@switch($nome)
    @case('whatsapp')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2Zm0 1.67c2.2 0 4.26.86 5.82 2.42a8.2 8.2 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.19 8.19 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24ZM8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.86-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.12-.24-.01-.39.11-.5.11-.11.27-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01Z"/></svg>
        @break
    @case('instagram')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.4" cy="6.6" r=".6" fill="currentColor"/></svg>
        @break
    @case('facebook')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-7.5h2.6l.4-3h-3V8.600c0-.870.250-1.470 1.500-1.470h1.600V4.450A21 21 0 0 0 14.270 4.330c-2.300 0-3.870 1.400-3.870 3.980V10.500H7.800v3h2.600V21h3.100Z"/></svg>
        @break
    @case('telefone')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.500 1.500a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
        @break
    @case('email')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2.500"/><path d="m3.500 7 8.500 6 8.500-6"/></svg>
        @break
    @case('mapa')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.200 7-11.500a7 7 0 1 0-14 0C5 14.800 12 21 12 21Z"/><circle cx="12" cy="9.500" r="2.500"/></svg>
        @break
    @case('relogio')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
        @break
    @case('calendario')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.500" y="5" width="17" height="15.500" rx="2.500"/><path d="M3.500 10h17M8 3v4M16 3v4"/></svg>
        @break
    @case('seta')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        @break
    @case('seta-esquerda')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
        @break
    @case('cruz')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v18M7 8.500h10"/></svg>
        @break
    @case('igreja')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v5M10 4h4M7 21V11.500L12 7l5 4.500V21M3.500 21v-5.500L7 13.500M20.500 21v-5.500L17 13.500M2.500 21h19M10.500 21v-3.500a1.500 1.500 0 0 1 3 0V21"/></svg>
        @break
    @case('pessoas')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="3.500"/><path d="M2.500 20a6.500 6.500 0 0 1 13 0M16 4.800a3.500 3.500 0 0 1 0 6.400M18 14.500a6 6 0 0 1 3.500 5.500"/></svg>
        @break
    @case('chama')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c1 3.500 5 5.500 5 10a5 5 0 0 1-10 0c0-1.800.8-3 1.800-4 .4 1.500 1.200 2.200 2.200 2.500C10.500 9 10.800 5.500 12 3Z"/><path d="M9 21h6"/></svg>
        @break
    @case('compartilhar')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="6" cy="12" r="2.500"/><circle cx="17.500" cy="6" r="2.500"/><circle cx="17.500" cy="18" r="2.500"/><path d="m8.200 10.800 7-3.600M8.200 13.200l7 3.600"/></svg>
        @break
    @case('fechar')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
        @break
    @case('info')
        <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5.500M12 7.600v.1"/></svg>
        @break
@endswitch

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 420 90" {{ $attributes }}>
    <defs>
        <linearGradient id="infraGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#059669" /> <stop offset="100%" stop-color="#0d9488" /> </linearGradient>
        <linearGradient id="accentGrad" x1="0%" y1="100%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#10b981" /> <stop offset="100%" stop-color="#06b6d4" /> </linearGradient>
        <filter id="subtleShadow" x="-10%" y="-10%" width="120%" height="120%">
            <feDropShadow dx="0" dy="4" stdDeviation="4" flood-color="#059669" flood-opacity="0.15"/>
        </filter>
    </defs>

    <g filter="url(#subtleShadow)">
        <path d="M 25,25 C 25,21 28.3,18 32.5,18 L 42.5,18 C 46.7,18 50,21 50,25 L 50,65 C 50,69 46.7,72 42.5,72 L 32.5,72 C 28.3,72 25,69 25,65 Z" fill="url(#infraGrad)" />
        
        <path d="M 45,35 L 65,55 C 68,58 72,58 75,55 L 75,55 C 77,53 77,49 75,47 L 60,32 C 57,29 53,29 50,32 Z" fill="url(#accentGrad)" opacity="0.9" />
        
        <path d="M 60,25 C 60,21 63.3,18 67.5,18 L 77.5,18 C 81.7,18 85,21 85,25 L 85,65 C 85,69 81.7,72 67.5,72 L 67.5,72 C 63.3,72 60,69 60,65 Z" fill="url(#infraGrad)" />
        
        <circle cx="55" cy="12" r="6" fill="url(#accentGrad)" />
    </g>

    <text x="110" y="52" font-family="'Figtree', 'Inter', sans-serif" font-weight="900" font-size="38" fill="#1e293b" letter-spacing="-1">Infra</text>
    
    <text x="195" y="52" font-family="'Figtree', 'Inter', sans-serif" font-weight="900" font-size="38" fill="url(#infraGrad)" letter-spacing="-1">Hub</text>
    
    <text x="112" y="72" font-family="'Figtree', 'Inter', sans-serif" font-weight="700" font-size="12" fill="#64748b" letter-spacing="4">KELURAHAN DIGITAL</text>
</svg>
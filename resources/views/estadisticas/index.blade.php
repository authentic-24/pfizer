<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadísticas</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { width: 100%; height: 100%; background: #f0f0f0; overflow: hidden; }
        iframe {
            display: block;
            width: 100vw;
            height: 100vh;
            border: none;
        }
        .btn-logout {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid rgba(0,0,0,0.08);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.82rem;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-weight: 600;
            letter-spacing: 0.3px;
            cursor: pointer;
            text-decoration: none;
            color: #444;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
            display: flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s ease;
        }
        .btn-logout:hover {
            background: #fff;
            color: #c0392b;
            border-color: rgba(192,57,43,0.25);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transform: translateY(-1px);
        }
        .btn-logout svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <a href="{{ route('estadisticas.logout') }}" class="btn-logout">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        Cerrar sesión
    </a>
    <iframe
        src="https://datastudio.google.com/embed/reporting/f1e83aaf-89ca-47aa-8b82-bee40e39e78b/page/nTtyF"
        allowfullscreen
        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"
    ></iframe>
</body>
</html>


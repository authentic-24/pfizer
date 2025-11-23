<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a Authentic E-learning</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background: #f4f8fb; color: #222; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px #0057b820; padding: 40px 32px; }
        .header { color: #0057b8; font-size: 2rem; font-weight: bold; margin-bottom: 16px; }
        .btn {
            display: inline-block;
            background: linear-gradient(90deg, #0057b8 0%, #00a86b 100%);
            color: #fff !important;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin: 24px 0;
            box-shadow: 0 2px 8px rgba(0,87,184,0.10);
            transition: background 0.3s;
        }
        .btn:hover { background: linear-gradient(90deg, #00a86b 0%, #0057b8 100%); }
        .footer { font-size: 0.95rem; color: #888; margin-top: 32px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">¡Bienvenido a Authentic E-learning!</div>
        <p>Hola <strong>{{ $usuario->nombre }}</strong>,</p>
        <p>¡Gracias por registrarte en nuestra comunidad profesional!<br>
        Has dado el primer paso para potenciar tu carrera en el sector farmacéutico y de la salud.</p>
        
        <p>Tu registro ha sido exitoso y pronto tendrás acceso a:</p>
        <ul>
            <li>Formación especializada y actualizada</li>
            <li>Mentores y expertos de la industria</li>
            <li>Red de networking profesional</li>
        </ul>
        
        <p><strong>¡Ya puedes acceder a la plataforma!</strong> Haz clic en el botón de abajo para ingresar:</p>
        
        <div style="text-align: center;">
            <a href="https://elearning.authenticfarma.com/" class="btn">Acceder a la Plataforma</a>
        </div>
        
        <p>Si tienes alguna pregunta o necesitas soporte, no dudes en contactarnos. Estamos aquí para acompañarte en tu crecimiento profesional.</p>
        <div class="footer">
            Gracias por confiar en Authentic E-learning.<br>
            Equipo authenticfarma <br>
            <a href="mailto:stack.dev@authentic.com.co" style="color:#0057b8;">stack.dev@authentic.com.co</a>
        </div>
    </div>
</body>
</html>
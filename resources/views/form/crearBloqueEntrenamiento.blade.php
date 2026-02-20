<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Bloque</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        .row {
            display: flex;
            gap: 15px;
        }
        .col {
            flex: 1;
        }
        .btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .btn:hover {
            background: #0056b3;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        small {
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Bloque de Entrenamiento</h1>
        
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('bloques.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" 
                       value="{{ old('nombre') }}" 
                       placeholder="Ej: Sweet Spot 8 min" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" 
                       value="{{ old('descripcion') }}" 
                       placeholder="Ej: Intervalos Sweet Spot">
            </div>
            
            <div class="form-group">
                <label for="tipo">Tipo *</label>
                <select id="tipo" name="tipo" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="rodaje" {{ old('tipo') == 'rodaje' ? 'selected' : '' }}>Rodaje</option>
                    <option value="intervalos" {{ old('tipo') == 'intervalos' ? 'selected' : '' }}>Intervalos</option>
                    <option value="fuerza" {{ old('tipo') == 'fuerza' ? 'selected' : '' }}>Fuerza</option>
                    <option value="recuperacion" {{ old('tipo') == 'recuperacion' ? 'selected' : '' }}>Recuperación</option>
                    <option value="test" {{ old('tipo') == 'test' ? 'selected' : '' }}>Test</option>
                </select>
                <small>Valores permitidos: rodaje, intervalos, fuerza, recuperacion, test</small>
            </div>
            
            <div class="form-group">
                <label for="duracion_estimada">Duración estimada (HH:MM:SS) *</label>
                <input type="text" id="duracion_estimada" name="duracion_estimada" 
                       value="{{ old('duracion_estimada') }}" 
                       placeholder="00:08:00" required>
                <small>Formato: horas:minutos:segundos (ej: 01:30:00)</small>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="potencia_pct_min">Potencia mínima % *</label>
                        <input type="number" id="potencia_pct_min" name="potencia_pct_min" 
                               value="{{ old('potencia_pct_min') }}" 
                               step="0.01" min="0" max="100" placeholder="88" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="potencia_pct_max">Potencia máxima % *</label>
                        <input type="number" id="potencia_pct_max" name="potencia_pct_max" 
                               value="{{ old('potencia_pct_max') }}" 
                               step="0.01" min="0" max="100" placeholder="94" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pulso_reserva_pct">Pulso reserva % *</label>
                <input type="number" id="pulso_reserva_pct" name="pulso_reserva_pct" 
                       value="{{ old('pulso_reserva_pct') }}" 
                       step="0.01" min="0" max="100" placeholder="80" required>
            </div>
            
            <div class="form-group">
                <label for="comentario">Comentario</label>
                <textarea id="comentario" name="comentario" rows="3" 
                          placeholder="Ej: Trabajo de umbral submáximo">{{ old('comentario') }}</textarea>
            </div>
            
            <button type="submit" class="btn">Crear Bloque</button>
        </form>
        
        <a href="/bloques" class="back-link">← Volver a la lista de bloques</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('procesarFormulario') }}" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" placeholder="Nombre de la Provincia" value="{{ $provincia ?? '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="localidades">Localidades (separadas por coma):</label>
            <input type="text" name="localidades" placeholder="Localidad 1, Localidad 2, ..." value="{{ $localidades ?? '' }}">
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>    
</body>
</html>
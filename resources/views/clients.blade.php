<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Lista de Clientes</h1>
        
        @if(!empty($message))
            <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                {{ $message }}
            </div>
        @endif

        @if(count($clients) > 0)
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Edad</th>
                        <th class="py-2 px-4 text-left">Ciudad</th>
                        <th class="py-2 px-4 text-left">Salario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $client['name'] }}</td>
                            <td class="py-2 px-4">{{ $client['age'] }}</td>
                            <td class="py-2 px-4">{{ $client['city'] }}</td>
                            <td class="py-2 px-4">{{ $client['salary'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-4 bg-gray-200 rounded">
                No clients available.
            </div>
        @endif
    </div>
</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Registros</h1>
                    
                    <!-- Exibir registros da tabela -->
                    @foreach($registros as $registro)
                        <p>Nome: {{ $registro->nome }}</p>
                        <p>Turma: {{ $registro->turma }}</p>
                        <p>Horário: {{ $registro->horario }}</p>
                        <p></p>
                        <!-- Outros campos podem ser exibidos aqui -->
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

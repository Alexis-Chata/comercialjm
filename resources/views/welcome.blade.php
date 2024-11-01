<x-guest-layout>

    <div class="py-12">
        <div class="lg:px-8 max-w-7xl mx-auto sm:px-6">
            <div id='productos_pdf' class="p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Productos</th>
                            <th>barra-ref_interna</th>
                            <th style="text-align: center;">Precio Caja</th>
                            <th style="text-align: center;">Precio Display</th>
                            <th style="text-align: center;">Precio Unidad</th>
                            <th style="text-align: center;">Cant/Cj</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->name }}</td>
                                <td>{{ $producto->codigo_barra }} - {{ $producto->referencia_interna }}</td>
                                <td style="text-align: end;padding-right: 3rem;">
                                    {{ 'S/. ' . number_format($producto->precio_caja, 2) }}</td>
                                <td style="text-align: end;padding-right: 3rem;">
                                    {{ 'S/. ' . number_format($producto->precio_display, 2) }}</td>
                                <td style="text-align: end;padding-right: 3rem;">
                                    {{ 'S/. ' . number_format($producto->precio_unidad, 2) }}</td>
                                <td style="text-align: center;">{{ $producto->cantidad_en_caja }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod</th>
                            <th>Productos</th>
                            <th>barra-ref_interna</th>
                            <th style="text-align: center;">Precio Caja</th>
                            <th style="text-align: center;">Precio Display</th>
                            <th style="text-align: center;">Precio Unidad</th>
                            <th style="text-align: center;">Cant/Cj</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @push('estiloscss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>
            div#example_wrapper select {
                padding-right: 2.5rem;
            }

            div#example_wrapper {
                padding: 15px;
                padding-bottom: 30px;
            }
        </style>
    @endpush

    @push('javascriptjs')
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#example').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }
                });

                window.onload = function() {
                    document.querySelector('#example_filter input').focus();
                };

            });
        </script>
    @endpush

</x-guest-layout>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>referencia_interna</th>
            <th>codigo_barra</th>
            <th>precio_caja</th>
            <th>precio_display</th>
            <th>precio_unidad</th>
            <th>cantidad_en_caja</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->referencia_interna }}</td>
                <td>{{ $producto->codigo_barra }}</td>
                <td>{{ $producto->precio_caja }}</td>
                <td>{{ $producto->precio_display }}</td>
                <td>{{ $producto->precio_unidad }}</td>
                <td>{{ $producto->cantidad_en_caja }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

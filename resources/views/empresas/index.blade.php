@extends("adm_layout.index")
@section("admin_template")

<div class="container-fluid px-4">
    <h1 class="mt-4">Empresas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Visualize e busque por empresas</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Empresas
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>CNPJ Básico</th>
                    <th>Razão Social</th>
                    <th>Natureza jurídica</th>
                    <th>Qualificação</th>
                    <th>Capital Social</th>
                    <th>Porte</th>
                    <th>Ente Federativo Responsável</th>
                </thead>
                <tbody>
                    @foreach($empresas as $linha)
                        <tr>
                            <td>{{$linha->id}}</td>
                            <td>{{$linha->cnpj_basico}}</td>
                            <td>{{$linha->razao_social}}</td>
                            <td>{{$linha->natureza_juridica}}</td>
                            <td>{{$linha->qualificacao}}</td>
                            <td>{{$linha->capital_social}}</td>
                            <td>{{$linha->porte}}</td>
                            <td>{{$linha->ente_federativo_responsavel}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
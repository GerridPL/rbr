@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <h1 class="display-3 text-center">
                    Użytkownicy
                </h1>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table id="users_table" class="table">
                    <thead class="table-primary">
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-3">Name</th>
                        <th class="col-sm-4">Email</th>
                        <th class="col-sm-2">Data utworzenia</th>
                        <th class="col-sm-2">Data edycji</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="col-sm-1">{{ $user->id }}</td>
                            <td class="col-sm-3">{{ $user->name }}</td>
                            <td class="col-sm-4">{{ $user->email }}</td>
                            <td class="col-sm-2">{{ $user->created_at}}</td>
                            <td class="col-sm-2">{{ $user->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#users_table').DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false,
                language: {
                    url: '{{ asset('//cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json') }}'
                }
            });
        });
    </script>
@endsection

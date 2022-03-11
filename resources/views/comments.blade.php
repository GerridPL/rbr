@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <h1 class="display-3 text-center">
                    Komentarze
                </h1>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table id="comments_table" class="table">
                    <thead class="table-primary">
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-2">Post</th>
                        <th class="col-sm-3">Treść</th>
                        <th class="col-sm-2">Autor</th>
                        <th class="col-sm-2">Data utworzenia</th>
                        <th class="col-sm-2">Data edycji</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td class="col-sm-1">{{ $comment->id }}</td>
                            <td class="col-sm-2">{{ $comment->post_id }}</td>
                            <td class="col-sm-3">{{ $comment->content }}</td>
                            <td class="col-sm-2">{{ $comment->author }}</td>
                            <td class="col-sm-2">{{ $comment->created_at}}</td>
                            <td class="col-sm-2">{{ $comment->updated_at}}</td>
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
            $('#comments_table').DataTable({
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

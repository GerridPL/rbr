@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <h1 class="display-3 text-center">
                    Posty
                </h1>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table id="posts_table" class="table">
                    <thead class="table-primary">
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-4">Tytuł</th>
                        <th class="col-sm-5">Treść</th>
                        <th class="col-sm-5">Autor</th>
                        <th class="col-sm-2">Data utworzenia</th>
                        <th class="col-sm-2">Data edycji</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="col-sm-4">{{ $post->id }}</td>
                            <td class="col-sm-5">{{ $post->title }}</td>
                            <td class="col-sm-5">{{ $post->content }}</td>
                            <td class="col-sm-5">{{ $post->author }}</td>
                            <td class="col-sm-2">{{ $post->created_at}}</td>
                            <td class="col-sm-2">{{ $post->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('js/external/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/external/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#posts_table').DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false,
                language: {
                    url: '{{ asset('language/Polish.json') }}'
                }
            });
        });
    </script>
@endsection


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <div class="container col-md-8">
        <div class="row">
            <div class="col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-style: bold;"><h4>Diccionario</h4>
                      <a href="{{ route('dictionary.create') }}" class="btn btn-warning col-md-4" style="text-right: center; display: inline-block;">Nueva palabra</a>
                      </div>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table id="table" class="table table-bordered table-hover dataTable table-striped" role="grid">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="success">Nombre</th>
                                <th>Creación</th>
                                <th>Funcionalidades</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($dictionary as $dic)

                                <tr class="success">
                                    <td class="warning">{{$dic->id}}</td>
                                    <td class="success">{{$dic->word}}</td>
                                    <td class="warning">{{$dic->updated_at}}</td>
                                    <td>
                                        
                                        <a class="btn btn-primary" href="{{ route('dictionary.edit',$dic->id) }}">Editar</a>
                                        <form action="{{ url('admin/dictionary/'.$dic->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $dic->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



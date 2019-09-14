
<?php ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Agregar una nueva palabra</h3></div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hubo un error.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/dictionary') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                                <label for="word" class="col-md-4 control-label">Palabra</label>

                                <div class="col-md-6">
                                    <input id="word" type="text" class="form-control" name="word" value="{{ old('word') }}"
                                           required autofocus>

                                    @if ($errors->has('word'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('word') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       Guardar
                                    </button>

                                    <a class="btn btn-link" onclick="goBack()">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection
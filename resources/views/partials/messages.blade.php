<h3 class="box-title" style="text-align: center;">Chat grupal</h3>

    <table id="table" class="table table-bordered table-hover dataTable table-striped col-md-8 offset-md-2" role="grid" >
         <thead>
            <tr class="danger">
                <th >ID</th>
                <th >Usuario</th>
                <th >Mensaje</th>
                <th colspan="3" nowrap>Enviado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $message)
                <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->user->name}}</td>
                    <td>{{$message->content}}</td>
                    <td>{{$message->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>           
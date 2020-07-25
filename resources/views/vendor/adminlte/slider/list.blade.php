@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos
@endsection

@section('main-content')
    @if(session()->has('message'))
        <div class="container-fluid spark-screen">
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif
	<div class="container-fluid spark-screen">
        <div class="row right">
            <div class="col-xs-2">
                <a class="action" href="{{ route("createNew") }}"><button type="button" class="btn btn-block btn-primary">Agregar</button></a>
            </div>
        </div>
        <div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Listado de sliders</h3>
                        <div class="box-tools">
                            <form role="form" method="get" action="{{ route('adminSliderhome') }}">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </form>
                        </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Titulo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acci&oacute;n</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr role="row" class="odd">
                                        <td>{{ $slider->id }}</td>
                                        <td class="sorting_1">{{ $slider->title }}</td>
                                        <td>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route("showSlider", ['setting' => $slider->id]) }}">Editar</a></li>
                                                <li><a onclick="if(confirm('Esta seguro que quiere eliminar el elemento?')) return true; else return false;" href="{{ route("deleteSlider", ['slider' => $image->id]) }}">Eliminar</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div></div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	</div>
@endsection

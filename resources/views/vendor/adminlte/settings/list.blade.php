@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Configuraciones
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
                <a class="action" href="{{ route('createSetting') }}"><button type="button" class="btn btn-block btn-primary">Agregar</button></a>
            </div>
        </div>
        <div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Listado de configuraciones</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">ID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Valor</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acci&oacute;n</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr role="row" class="odd">
                                        <td>{{ $setting->id }}</td>
                                        <td class="sorting_1">{{ $setting->key }}</td>
                                        <td>{{ $setting->value }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">Acci&oacute;n</button>
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route("showSetting", ['setting' => $setting->id]) }}">Editar</a></li>
                                                </ul>
                                            </div>
                                         </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div></div>
                            <!-- div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                                            <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                                            <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </div></div -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	</div>
@endsection

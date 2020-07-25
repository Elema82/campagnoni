@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Configuraciones
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar configuraci&oacute;n</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('updateSetting',['setting' => $setting->id]) }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="key" class="form-control" id="exampleInputkey" value="{{ $setting->key }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputvalue">Valor</label>
                        <input type="text" name="value" class="form-control" id="exampleInputvalue" value="{{ $setting->value }}">
                    </div>

                <!-- /.box-body -->
                @if(isset($errors))
                    <div class="form-group has-error">
                    @foreach($errors->all() as $error)
                        <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o"></i> {{ $error }}</label>
                    @endforeach
                    </div>
                @endif
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
	</div>
@endsection

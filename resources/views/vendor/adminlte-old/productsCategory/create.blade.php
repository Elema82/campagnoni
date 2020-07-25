@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear atributo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('saveProductCategory') }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="key" class="form-control" id="exampleInputkey" value="">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
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

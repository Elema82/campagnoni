@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('saveProduct') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="col-sm-6">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="name" class="form-control" id="exampleInputkey" value="">
                    </div>
                    <div class="col-sm-6">
                        <label>Tipo</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Descripcion</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Imagenes</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Thumbnail</label>

                        <input id="thumbnail" name="thumbnail" type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>
                    </div>
                    <div class="form-group">
                        <label>Principal</label>

                        <input id="imagenes" name="principal" type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>
                    </div>
                    <div class="form-group">
                        <label>Secundarias</label>

                        <input id="imagenes" name="imagenes[]" multiple type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>
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

@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Novedades
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear novedad</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('saveNew') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                        <label for="exampleInputkey">Titulo</label>
                            <input type="text" name="title" class="form-control" id="exampleInputkey" value="">
                        </div>
                        <div class="col-sm-6">
                        <label for="exampleInputkey">Subtitulo</label>
                            <textarea name="short_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label>Descripcion</label>
                        <textarea name="description" class="form-control" rows="3" style="height: 450px;" placeholder="Enter ..."></textarea>
                    </div>

                    <div class="col-sm-6">
                        <label>Video</label>
                        <input type="text" name="video" class="form-control" id="exampleInputkey" value="">
                        <span class="info" style="color:#6464ff;">Ejemplo: https://www.youtube.com/embed/XdkNICbZaQs</span>
                    </div>
                    <div class="col-sm-6">
                        <label>Estado</label>
                        <select name="status" class="form-control">
                            @foreach($status as $value)
                                <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Imagenes</h3>
                </div>
                <div class="box-body">
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

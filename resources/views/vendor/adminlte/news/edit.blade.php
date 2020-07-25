@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar novedad</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('updateNew',['new' => $new->id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                        <label for="exampleInputkey">Titulo</label>
                            <input type="text" name="title" class="form-control" id="exampleInputkey" value="{{ $new->title }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleInputkey">Subtitulo</label>
                            <textarea name="short_description" class="form-control" rows="3" placeholder="Enter ...">{{ $new->short_description }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Descripcion</label>
                        <textarea name="description" id="editor1" class="form-control ckeditor" rows="8" placeholder="Enter ...">{{ $new->description }}</textarea>
                    </div>

                    <div class="col-sm-6">
                        <label>Video</label>
                        <input type="text" name="video" class="form-control" id="exampleInputkey" value="{{ $new->video }}">
                        <span class="info" style="color:#6464ff;">Ejemplo: https://www.youtube.com/embed/XdkNICbZaQs</span>
                    </div>
                    <div class="col-sm-6">
                        <label>Estado</label>
                        <select name="status" class="form-control">
                            @foreach($status as $value)
                                @if($value['id'] == $new->status)
                                    <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
                                @else
                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Imagenes</h3>
                    </div>

                    <div class="form-group">
                        <label>Principal</label>

                        <input id="imagenes" name="principal" type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>

                        <br>
                        <div class="timeline-body" style="background-color: #545257; width: 220px;">
                            @foreach($new->attachments as $attachment)
                                @if($attachment->id == $new->img_principal)
                                    <img src="{{ $attachment->url_path }}" width="200" class="margin" alt="...">
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Secundarias</label>

                        <input id="imagenes" name="imagenes[]" multiple type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>

                        <br>

                        <div class="timeline-body" style="background-color: #545257;">
                            @foreach($new->attachments as $attachment)
                                @if($attachment->id != $new->img_principal && $attachment->id != $new->img_thumbnail)
                                    <img class="margin" alt="..." src="{{ $attachment->url_path }}" width="200">
                                @endif
                            @endforeach

                        </div>

                        <div class="box-header with-border">
                            <input type="checkbox" name="removeall"/>
                            <label>Eliminar todas</label>
                        </div>
                        <br>

                        <div class="pad margin no-print">
                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i> Note:</h4>
                                Las imagenes se sobreescriben
                            </div>
                        </div>

                        <br>

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

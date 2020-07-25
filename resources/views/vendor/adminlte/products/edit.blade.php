@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('updateProduct',['product' => $product->id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="col-sm-6">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="name" class="form-control" id="exampleInputkey" value="{{ $product->name }}">
                    </div>

                    <div class="col-sm-6">
                        <label>Tipo</label>
                        <select name="category" class="form-control" disabled>
                            @foreach($categories as $type)
                                @if($type->id == $product->category)
                                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Descripcion</label>
                        <textarea name="description" class="form-control" rows="8" placeholder="Enter ...">{{ $product->description }}</textarea>
                    </div>
                </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Atributos</h3>
                    </div>
                <div class="box-body">
                    <div class="form-group">
                        @foreach($attributes as $attribute)
                            <div class="col-sm-6">
                                <label for="exampleInputkey">{{ $attribute->key }}</label>
                                @php
                                    $val = ''
                                @endphp
                                @foreach($attributesValues as $value)
                                    @if($value->key == $attribute->id)
                                        @php
                                            $val = $value->value
                                        @endphp
                                    @endif
                                @endforeach
                                <input type="text" name="attributes[{{ $attribute->id }}]" class="form-control" id="exampleInputkey" value="{{ $val }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Imagenes</h3>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>

                        <input id="thumbnail" name="thumbnail" type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>
                        <br>
                        <div class="timeline-body" style="background-color: #545257; width: 220px;">
                            @foreach($product->attachments as $attachment)
                                @if($attachment->id == $product->img_thumbnail)
                                    <img src="{{ $attachment->url_path }}" width="200" class="margin" alt="...">
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Principal</label>

                        <input id="imagenes" name="principal" type="file" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]'>

                        <br>
                        <div class="timeline-body" style="background-color: #545257; width: 220px;">
                            @foreach($product->attachments as $attachment)
                                @if($attachment->id == $product->img_principal)
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
                            @foreach($product->attachments as $attachment)
                                @if($attachment->id != $product->img_principal && $attachment->id != $product->img_thumbnail)
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

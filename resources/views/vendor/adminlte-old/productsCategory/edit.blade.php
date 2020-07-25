@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Productos - Atributos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar atributo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('updateProductCategory',['product' => $product->id]) }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="key" class="form-control" id="exampleInputkey" value="{{ $product->key }}">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $type)
                                @if($type->id == $product->type)
                                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endif
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

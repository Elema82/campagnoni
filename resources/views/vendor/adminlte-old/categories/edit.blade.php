@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Categorias
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar categoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('updateCategory',['category' => $category->id]) }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputkey">Nombre</label>
                        <input type="text" name="name" class="form-control" id="exampleInputkey" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="type" class="form-control">
                            @if($category->type == "productos")
                                <option value="productos" selected>Productos</option>
                                <option value="novedades">Novedades</option>
                            @else
                                <option value="productos">Productos</option>
                                <option value="novedades" selected>Novedades</option>
                            @endif
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

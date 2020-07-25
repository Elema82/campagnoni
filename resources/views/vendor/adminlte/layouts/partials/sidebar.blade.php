<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!-- form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- li class="active"><a href="{{ route('users') }}"><i class='fa fa-users'></i> <span>Usuarios</span></a></li -->
            <li><a href="{{ route('adminCategories') }}"><i class='fa fa-tags'></i> <span> Categorias </span></a></li>
            <li><a href="{{ route('adminNews') }}"><i class='fa fa-newspaper-o'></i> <span> Novedades </span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-align-justify'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="{{ route('adminSettings') }}"><i class="fa fa-industry"></i> Configuraciones</a></li>
                    <li><a href="{{ route('adminSliderhome') }}"><i class="fa fa-object-group"></i> Slider Home</a></li>
                </ul>
            </li>
            <li class="treeview">

                <a href="#"><i class='fa fa-align-justify'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="{{ route('adminProducts') }}"><i class="fa fa-industry"></i> Productos</a></li>
                    <li><a href="{{ route('adminProductsCategory') }}"><i class="fa fa-object-group"></i> Atributos</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

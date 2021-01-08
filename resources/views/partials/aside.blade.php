<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">

    {{-- Home --}}
    <li class="treeview">

      <a href="#">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Overview</a></li>
          </ul>
    </li>

    {{-- Manage users --}}
    <li class="treeview">
        <?php
          if (Auth::user()->can('view_user'))
          {?>
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if(Auth::user()->can('view_user')){?>
            <li><a href="{{ url('/view-users') }}"><i class="fa fa-users"></i> Users</a></li>
            <?php }?>
          </ul>
          <?php }?>
    </li>

    {{-- Manage Projects --}}
    <li class="treeview">
        <?php
          if (Auth::user()->can('view_project'))
          {?>
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Manage Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if(Auth::user()->can('view_project')){?>
            <li><a href="{{ url('/projects') }}"> Projects</a></li>
            <?php }?>
          </ul>
          <?php }?>
    </li>

    {{-- Manage Tasks --}}
    <li class="treeview">
        <?php
          if (Auth::user()->can('view_task'))
          {?>
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Manage Tasks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if(Auth::user()->can('view_task')){?>
            <li><a href="{{ url('/tasks') }}">Tasks</a></li>
            <?php }?>
          </ul>
          <?php }?>
    </li>

    {{--  Manage Purchase Order  --}}
    <li class="treeview">

          <a href="#">
            <i class="fa fa-file"></i>
            <span>Manage PO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ url('/purchase/order/create') }}">Add Purchase Order</a></li>

          </ul>

    </li>

    {{-- Manage Permission --}}
    <li class="treeview">
        <?php
      if (Auth::user()->can('manage_privileges'))
      {?>
      <a href="#">
        <i class="fa fa-universal-access"></i> <span>Manage Permissions</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>

      <ul class="treeview-menu">
      <?php if(Auth::user()->can('manage_privileges')){?>
        <li>
        <a href="{{ url('/settings/manage_users/permissions') }}"><i class="fa fa-circle-o"></i> View Permission</a>
        </li>

        <li>
        <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}"><i class="fa fa-circle-o"></i> Assign Permissions to Role</a>
        </li>

        <li>
        <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}"><i class="fa fa-circle-o"></i> Entrust Permission to User</a>
        </li>
        <?php }?>
      </ul>
      <?php }?>
    </li>

    {{-- Manage Roles --}}
    <li class="treeview">
        <?php
      if (Auth::user()->can('manage_privileges'))
      {?>
      <a href="#">
        <i class="fa fa-check"></i> <span>Manage Roles</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <?php if(Auth::user()->can('manage_privileges')){?>
        <li>
        <a href="{{ url('/settings/manage_users/roles') }}"><i class="fa fa-circle-o"></i> View Roles</a>
        </li>

        <li>
        <a href="{{ url('/settings/manage_users/roles/create') }}"><i class="fa fa-circle-o"></i> Entrust Role to User</a>
        </li>
        <?php }?>
      </ul>
      <?php }?>
    </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

 <aside class="main-sidebar">



    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="text-transform: uppercase;">
           user-name
          </p>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>
        <li >
          <a href="{{route('index_pro')}}">
            <i class="fa fa-th"></i> <span>Quản lí sản phẩm</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li >
           <a href="{{route('category')}}">
           <i class="fa fa-th"></i> <span>Quản lí danh mục</span>
            </a>
        </li>
        <li>
          <a href="{{route('user')}}">
            <i class="fa fa-th"></i> <span>Quản lí thành viên</span>
          </a>
        </li>
        <li>
          <a href="{{route('order_list')}}">
            <i class="fa fa-th"></i> <span>Quản lí đơn hàng</span>
          </a>
        </li>

      </ul>
    </section>

</aside>

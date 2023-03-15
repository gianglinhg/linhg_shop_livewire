<div class="row">
  <div class="col-xs-12">
    <div class="page-title-box">
      <h4 class="page-title">{{$title ?? 'Tiêu đề trang'}}</h4>
      <ol class="breadcrumb p-0 m-0">
        <li>
          <a href="#">
            @php
              $admin_arr = array('admin','super-admin');
              foreach (Auth::user()->roles as $key => $role) {
                if(in_array($role->name, $admin_arr))
                  echo 'Quản trị viên';
                else echo 'Thành viên';
              }
            @endphp
          </a>
        </li>
        <li><a href="{{$subtitle->path ?? '#'}}">{{$subtitle->name ?? 'Tiêu đề phụ'}}</a></li>
        <li class="active">{{$title ?? 'Tiêu đề trang'}}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
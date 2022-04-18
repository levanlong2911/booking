<div class="sidebar-container">
  <div class="sidebar-logo">
      <img class="logo" src="{{ asset('admin/img/logo.png') }}" alt="">
  </div>
  <ul class="sidebar-navigation">
      <li class="header"></i>COMMUNITY</li>
      <li>
          <a href="{{ route('admin.index') }}">
              <i class="fa fa-tachometer" aria-hidden="true"></i> User List
          </a>
      </li>
      <li class="header">Booking</li>
      <li>
          <a href="{{ route('department.index') }}">
              <i class="fa fa-users" aria-hidden="true"></i> Department List
          </a>
      </li>
      <li>
          <a href="{{ route('position.index') }}">
              <i class="fa fa-cog" aria-hidden="true"></i> Position List
          </a>
      </li>
      <li>
          <a href="{{ route('room.index') }}">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Room List
          </a>
      </li>
      <li>
          <a href="{{ route('booking.index') }}">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Booking List
          </a>
      </li>
  </ul>
</div>

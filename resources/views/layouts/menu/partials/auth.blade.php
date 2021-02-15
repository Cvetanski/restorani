<a href="#" class="btn btn-neutral btn-icon web-menu" data-toggle="dropdown" role="button">
    <span class="btn-inner--icon">
        <i class="fa fa-user mr-2"></i>
      </span>
    <span class="nav-link-inner--text">{{ Auth::user()->name }}</span>
</a>
<a href="#" class="nav-link nav-link-icon mobile-menu" style=" color: #ed1d25 !important; " data-toggle="dropdown" role="button">
    <span class="btn-inner--icon">
        <i class="fa fa-user mr-2"></i>
      </span>
    <span class="nav-link-inner--text">{{ Auth::user()->name }}</span>
</a>
<div class="dropdown-menu">
    <a href="/profile" class="dropdown-item">Мој профил</a>
    @role('admin')
        <a href="/home" class="dropdown-item">Работна табла</a>
        <a class="dropdown-item " href="/live">Нарачки во живо</a>
        <a href="/orders" class="dropdown-item">Нарачки</a>
        <a href="/restorants" class="dropdown-item">Ресторани</a>
        <a href="/drivers" class="dropdown-item">Возачи</a>
        <a href="/clients" class="dropdown-item">Клиенти</a>
        <a href="/pages" class="dropdown-item">Страници</a>
        <a href="/settings" class="dropdown-item">Подесувања</a>
    @endrole
    @role('owner')
        <a href="/home" class="dropdown-item">Работна табла</a>
        <a class="dropdown-item " href="/live">Нарачки во живо</a>
        <a href="/orders" class="dropdown-item">Нарачки</a>
        <a href="{{ route('restorants.edit', auth()->user()->restorant->id) }}" class="dropdown-item">Ресторан</a>
        <a href="/items" class="dropdown-item">Мени</a>
    @endrole
    @role('client')
        <a href="/orders" class="dropdown-item">Мои нарачки</a>
        <a href="addresses" class="dropdown-item">Мои адреси</a>
{{--    <a href="/order_history" class="dropdown-item">Статус на нарачка</a>--}}
    @endrole
    @role('driver')
        <a href="/orders" class="dropdown-item">Нарачки </a>
    @endrole
   <!-- <a href="/logout" class="dropdown-item">Logout</a>-->
   <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <span>Одјави се</span>
    </a>
</div>

<!-- <a href="/home" target="_blank" class="btn btn-neutral btn-icon">
    <span class="btn-inner--icon">
      <i class="fa fa-user mr-2"></i>
    </span>
    <span class="nav-link-inner--text">Profile</span>
  </a> -->

@if (Sentry::check())
  <ul class="nav">
    <li class="{{ Request::is('admin/pages*') ? 'active' : null }}"><a href="{{ URL::route('admin.pages.index') }}"><i class="icon-book"></i> Pages</a></li>
    <li class="{{ Request::is('admin/articles*') ? 'active' : null }}"><a href="{{ URL::route('admin.articles.index') }}"><i class="icon-edit"></i> Articles</a></li>
    <li class="{{ Request::is('admin/simnotifications*') ? 'active' : null }} "><a href="{{ URL::route('admin.simnotifications.index') }}"><i class="icon-bell"></i> SimNotifications <span class="badge badge-info" id="notification"> {{$count}}</span></a></li>
    <li><a href="{{ URL::route('admin.logout') }}"><i class="icon-lock"></i> Logout</a></li>
  </ul>

@endif

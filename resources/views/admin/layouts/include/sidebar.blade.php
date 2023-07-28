<div class="sidebar">
    <a class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">Dashboard</a>
    <a class="{{ Request::routeIs('admin.event.*') ? 'active' : '' }}" href="{{route('admin.event.index')}}">Event</a>
  </div>

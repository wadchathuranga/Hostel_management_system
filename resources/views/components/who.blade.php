@if (Auth::guard('web')->check())
  <small class="badge badge-success">
    {{--Logged In as a --}}<strong>USER</strong>
  </small>
@else
  <small class="badge badge-danger">
    {{--Logged Out as a --}}<strong>USER</strong>
  </small>
@endif

<br>

@if (Auth::guard('admin')->check())
  <small class="badge badge-success">
    {{--Logged In as a --}}<strong>ADMIN</strong>
  </small>
@else
  <small class="badge badge-danger">
    {{--Logged Out as a --}}<strong>ADMIN</strong>
  </small>
@endif

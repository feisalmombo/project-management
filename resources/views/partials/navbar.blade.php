<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->

    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">

        @if(Auth::user()->hasRole('developer'))
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-danger">

        {{--  @if(Auth::user() && !Auth::user()->can('')
        //->where('status','=','Booked')
        //->where('customer_id','=',Auth::user()->id)
        ->count());  --}}

        <!--This show all Request customer -->
            <i class=""> 0
               </i>
                {{--  @endif  --}}
                @if(Auth::user() && Auth::user()->can('') && $notifications=count(DB::table('request_customers')
                                    ->join('request_items','request_items.requestcustomer_id','=','request_customers.id')
                                    ->select('request_customers.status','request_items.id')
                                    ->whereNotIn('request_customers.time_allocated',function($q){
                                })
                                ->whereIn('request_items.id',function($q){$q->select('after_attends.requestitem_id')
                                ->from('after_attends');
                                })
                                ->get()
                                ))
                <i class=""> {{$notifications=count(DB::table('request_customers')
                                    ->join('request_items','request_items.requestcustomer_id','=','request_customers.id')
                                    ->select('request_customers.status','request_items.id')
                                    ->whereNotIn('request_customers.time_allocated',function($q){

                                })
                                ->whereIn('request_items.id',function($q){$q->select('after_attends.requestitem_id')
                                ->from('after_attends');
                            })
                            ->get()
                            )
                                        }}
                                        </i>
                @endif
            </span>
      </a>
      @endif

      <ul class="dropdown-menu">
        <li class="header">This is the part for notifications menu</li>

        {{--  @if(Auth::user() && !Auth::user()->can('') && count($newRequests = App\RequestCustomer::where('request_customers.status', '=', 'Booked')
         ->join('users','request_customers.customer_id','=','users.id')
        ->select('request_customers.id','request_customers.created_at', 'users.first_name', 'users.last_name')
        ->get()
        ))  --}}

{{--  @foreach($newRequests as $new_request)  --}}
<li>
<a href="#">
<div>
<i class="fa fa-comment fa-fw"></i> 0
<span class="pull-right text-muted small">0</span>
</div>
</a>
</li>
<li class="divider"></li>
{{--  @endforeach  --}}
{{--  @endif  --}}
@if(Auth::user()->can('') && count($notifications = DB::table('request_customers')
->join('request_items','request_items.requestcustomer_id','=','request_customers.id')
->get()
))

@foreach($notifications as $notification)
<li>
<a href="/{{$notification->id}}">
<div>
<i class="fa fa-comment fa-fw"></i>{{str_limit($notification->goods_description, $limit = 10, $end = '...')}}
<span class="pull-right text-muted small">{{date("F jS, Y", strtotime($notification->created_at))}}</span>
</div>
</a>
</li>
<li class="divider"></li>
@endforeach
@endif
<li>
<a class="text-center" href="{{ url('/requests') }}">
<strong>See All Request Customer </strong>
<i class="fa fa-angle-right"></i>
</a>
</li>
      </ul>

</li>
    <!-- style can be found in dropdown.less -->

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @foreach(App\Role::All() as $role)
        @if(Auth::user()->hasRole($role->slug)),
        {{$role->name}}
        @endif
   @endforeach

   {!!": <strong>".Auth::user()->first_name."</i></strong>"!!} <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu">

      <!-- Menu Footer-->
      <li class="user-footer">
        <div>
          <a href="{{ url('/change-password') }}"><i class="fa fa-gear fa-fw"></i> Change Password</a>
        </div>
        <div>
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out fa-fw"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>

      </div>
    </li>
  </ul>
  </li>
</ul>
</div>

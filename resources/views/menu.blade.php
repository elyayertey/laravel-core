<div class="list-group">
    <a href="#" class="list-group-item disabled">
        Manage Settings
    </a>

    @if(Auth::user()->user_level==1)
            <!--Administrator Section-->
    <a href="/administrator" class="list-group-item"><i class="fa fa-lock"></i>&nbsp;&nbsp;Administrator</a>
    <a href="/users" class="list-group-item"><i class="fa fa-user"></i>&nbsp;&nbsp;Users</a>
    <!--End Section-->
    @endif
    <a href="/messages/inbox" class="list-group-item"><i class="fa fa-list"></i>&nbsp;&nbsp;Messages</a>
    <a href="/settings" class="list-group-item"><i class="fa fa-cog"></i>&nbsp;&nbsp;Settings</a>
    <a href="/passwords" class="list-group-item"><i class="fa fa-key"></i>&nbsp;&nbsp;Change password</a>
    <a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
</div>
<div class="list-group">
    <a href="#" class="list-group-item disabled">
        Manage Settings
    </a>

    @if(Auth::user()->user_level==3)
            <!--Administrator Section-->
    <a href="/administrator" class="list-group-item"><i class="fa fa-lock"></i>&nbsp;&nbsp;Administrator</a>
    <!--End Section-->
    @endif
    <a href="/settings" class="list-group-item"><i class="fa fa-cog"></i>&nbsp;&nbsp;Settings</a>
    <a href="/passwords" class="list-group-item"><i class="fa fa-key"></i>&nbsp;&nbsp;Change password</a>
    <a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
</div>
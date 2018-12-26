
<div class="sui-navbar">
    <div class="navbar-inner"><a href="#" class="sui-brand">Marry Christmas</a>
        <ul class="sui-nav">
            <li class="active"><a href="{{url('show')}}">首页</a></li>
            <li><a href="{{url('showRegister')}}">注册</a></li>
            @if(auth()->guest())
                <li class="sui-dropdown"><a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">用户<i class="caret"></i></a>
                    <ul role="menu" class="sui-dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('user_info')}}">用户信息</a></li>
                    </ul>
                </li>
                <li><a href="{{url('logout')}}">退出</a></li>
            @endif

        </ul>
    </div>
</div>
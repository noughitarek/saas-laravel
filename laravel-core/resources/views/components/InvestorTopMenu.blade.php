<nav class="top-nav">
  <ul>
    @foreach(config('investors-menu') as $menu)
    <li>
      <a href="{{ isset($menu['route']) && Route::has($menu['route']) ? route($menu['route']) : 'javascript:;' }}" class="top-menu {{explode('.', Route::currentRouteName())[0]==$menu['section']?'top-menu--active':''}}">
        <div class="top-menu__icon">
          <i data-lucide="{{$menu["icon"]}}"></i>
        </div>
        <div class="top-menu__title"> {{$menu["title"]}}
          @if(isset($menu['sub_menu']))
            <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
          @endif
        </div>
      </a>
      @if(isset($menu['sub_menu']))
      <ul class="">
        @foreach($menu['sub_menu'] as $sub_menu)
        <li>
          <a href="{{ isset($sub_menu['route']) && Route::has($sub_menu['route']) ? route($sub_menu['route']) : 'javascript:;' }}" class="top-menu">
            <div class="top-menu__icon">
              <i data-lucide="{{$sub_menu['icon']}}"></i>
            </div>
            <div class="top-menu__title"> {{$sub_menu["title"]}}
              @if(isset($sub_menu['sub_menu']))
                <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
              @endif
            </div>
          </a>
          @if(isset($sub_menu['sub_menu']))
          <ul class="">
            @foreach($sub_menu['sub_menu'] as $sub_sub_menu)
            <li>
              <a href="{{ isset($sub_sub_menu['route']) && Route::has($sub_sub_menu['route']) ? route($sub_sub_menu['route']) : 'javascript:;' }}" class="top-menu">
                <div class="top-menu__icon">
                  <i data-lucide="{{$sub_sub_menu['icon']}}"></i>
                </div>
                <div class="top-menu__title">{{$sub_sub_menu['title']}}</div>
              </a>
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach
      </ul>
      @endif
    </li>
    @endforeach
  </ul>
</nav>
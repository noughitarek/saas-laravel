<div class="mobile-menu md:hidden">
  <div class="mobile-menu-bar">
    <a href="" class="flex mr-auto">
      <img alt="Saas- ecoshark" class="w-6" src="{{asset('assets/dashboard/images/logo.svg')}}">
    </a>
    <a href="javascript:;" class="mobile-menu-toggler">
      <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
    </a>
  </div>
  <div class="scrollable">
    <a href="javascript:;" class="mobile-menu-toggler">
      <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
    </a>
    <ul class="scrollable__content py-2">
      @foreach(config('investors-menu') as $menu)
      <li>
        <a href="{{ isset($menu['route']) && Route::has($menu['route']) ? route($menu['route']) : 'javascript:;' }}" class="menu {{explode('.', Route::currentRouteName())[0]==$menu['section']?'menu--active':''}}">
          <div class="menu__icon">
          <i data-lucide="{{$menu['icon']}}"></i>
          </div>
          <div class="menu__title">{{$menu["title"]}}
            @if(isset($menu['sub_menu']))
              <i data-lucide="chevron-down" class="menu__sub-icon"></i>
            @endif
          </div>
        </a>
        @if(isset($menu['sub_menu']))
        <ul class="">
          @foreach($menu['sub_menu'] as $sub_menu)
          <li>
            <a href="{{ isset($sub_menu['route']) && Route::has($sub_menu['route']) ? route($sub_menu['route']) : 'javascript:;' }}" class="menu">
              <div class="menu__icon">
                <i data-lucide="{{$sub_menu['icon']}}"></i>
              </div>
              <div class="menu__title"> {{$sub_menu["title"]}}
              @if(isset($sub_menu['sub_menu']))
                <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
              @endif
              </div>
            </a>
            @if(isset($sub_menu['sub_menu']))
            <ul class="">
              @foreach($sub_menu['sub_menu'] as $sub_sub_menu)
              <li>
                <a href="{{ isset($sub_sub_menu['route']) && Route::has($sub_sub_menu['route']) ? route($sub_sub_menu['route']) : 'javascript:;' }}" class="menu">
                  <div class="menu__icon">
                    <i data-lucide="{{$sub_sub_menu['icon']}}"></i>
                  </div>
                  <div class="menu__title">{{$sub_sub_menu['title']}}</div>
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
  </div>
</div>
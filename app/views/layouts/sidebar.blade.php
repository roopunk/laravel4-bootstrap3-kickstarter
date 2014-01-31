<div id="sidebar-nav">
        <ul id="dashboard-menu">
        
        	@foreach (Nav::admin() as $nav)
            	<li @if ($menu_parent == $nav['parent-menu']) class="active" @endif>
                	
                    @if ($menu_parent == $nav['parent-menu'])
                         <div class="pointer">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                    @endif
                	<a  @if ( isset($nav['submenu']) )class="dropdown-toggle" @endif href="{{$nav['url']}}">
                        <i class="{{$nav['icon']}}"></i>
                        <span>{{$nav['label']}}</span>
                        @if ( isset($nav['submenu']) )
                        	<i class="icon-chevron-down"></i>
                        @endif
                    </a>
                    
                    @if ( isset($nav['submenu']) )
                    	 <ul class="submenu" @if ($menu_parent == $nav['parent-menu']) style="display:block" @endif>
                            @foreach ($nav['submenu'] as $sub_nav)
                            	<li><a @if(@$menu_sub == $sub_nav['child-menu']) class="active" @endif href="{{$sub_nav['url']}}">{{$sub_nav['label']}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        
           
        </ul>
    </div>
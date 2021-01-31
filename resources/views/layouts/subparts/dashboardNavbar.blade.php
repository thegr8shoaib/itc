<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand mt-0" href="{!! route('home') !!}">
                      <img src="{!! asset( conf('logo')) !!}" alt="">

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                      class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="{{ requestIs('home') }} nav-item">
              <a href="{!! route('home') !!}"><i class="feather icon-home"></i>
                <span class="menu-title" >Home</span>
             </a>
            </li>


              <li class="{{ requestIs('products.index') }} nav-item">
                <a href="{!! route('products.index') !!}"><i class="feather icon-layers"></i>
                  <span class="menu-title" >Products</span>
               </a>
              </li>




            <li class="{{ requestIs('purchase.index') }} nav-item">
              <a href="{!! route('purchase.index') !!}"><i class="fa fa-truck"></i>

                <span class="menu-title" >Purchase</span>
             </a>
            </li>
            <li class="{{ requestIs('pos.index') }} nav-item">
              <a href="{!! route('pos.index') !!}"><i class="fa fa-shopping-cart"></i>
                <span class="menu-title" >POS</span>
             </a>
            </li>



            <li class="{{ requestIs('expence.index') }} nav-item">
              <a href="{!! route('expence.index') !!}"><i class="fa fa-money" aria-hidden="true"></i>
                <span class="menu-title" >Expences</span>
             </a>

            </li>
            {{-- <li class="{{ requestIs('company.index') }} nav-item">
              <a href="{!! route('company.index') !!}"><i class="fa fa-building"></i>
                <span class="menu-title" >Company</span>
             </a>
            </li> --}}



            <li class="{{ requestIsFromArray([ 'salemans.index', 'salemans.edit' ,'salemans.create' ]) }} nav-item">
              <a href="{!! route('salemans.index') !!}"><i class="feather icon-send"></i>
                <span class="menu-title" >Salemans</span>
             </a>
            </li>

            <li class=" nav-item"><a href="javascript:void(0)"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Icons">User</span></a>
                <ul class="menu-content">
                    @if (superAdmin())
                      <li class=" {{ requestIs('users.index') }}"><a href="{{ route('users.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Feather">List</span></a>
                      </li>
                    @endif

                    <li class=" {{ requestIs('profile') }}"><a href="{{ route('profile') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Feather">Profile</span></a>
                    </li>


                </ul>
            </li>


            {{-- <li class=" nav-item"><a href="#"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Extra Components">Extra Components</span></a>
<ul class="menu-content">
<li><a href="ex-component-avatar.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Avatar">Avatar</span></a>
</li>
<li ><a href="ex-component-chips.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Chips">Chips</span></a>
</li>
<li><a href="ex-component-divider.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Divider">Divider</span></a>
</li>
</ul>
</li> --}}
            {{-- <li class=" navigation-header"><span>Forms &amp; Tables</span>
</li> --}}









        </ul>
    </div>
</div>
<!-- END: Main Menu-->

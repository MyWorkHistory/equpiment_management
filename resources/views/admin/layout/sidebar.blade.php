<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{asset('assets/images/logo.svg')}}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text font-weight-bold">TECH <span class="text-danger">X</span> </h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">        
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @role('Admin')
        <li>
            <a href="{{route('admin.clients.index')}}">
                <div class="parent-icon icon-color-3"> <i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Clients</div>
            </a>
        </li>
        
        <li>
            <a href="{{route('admin.equipment-types.index')}}">
                <div class="parent-icon icon-color-5"><i class="bx bx-conversation"></i>
                </div>
                <div class="menu-title">Type of Equipment</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.shipping-cases.index')}}">
                <div class="parent-icon icon-color-6"><i class="bx bx-task"></i>
                </div>
                <div class="menu-title">Shipping Case</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.equipments.index')}}"  >
                <div class="parent-icon icon-color-7"><i class="bx bx-file"></i>
                </div>
                <div class="menu-title">Equipments</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.contacts.index')}}"  >
                <div class="parent-icon icon-color-7"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon icon-color-8"> <i class="bx bx-calendar-check"></i>
                </div>
                <div class="menu-title">Search Inventory by Asset Tag</div>
            </a>
        </li>   
        <li>
            <a href="#">
                <div class="parent-icon icon-color-8"> <i class="bx bx-calendar-check"></i>
                </div>
                <div class="menu-title">Search Inventory by Serial Number</div>
            </a>
        </li>              
        <li>
            <a href="#">
                <div class="parent-icon icon-color-8"> <i class="bx bx-calendar-check"></i>
                </div>
                <div class="menu-title">Browse Inventory by Manufacture</div>
            </a>
        </li> 
        @endrole   
    </ul>
    <!--end navigation-->
</div>
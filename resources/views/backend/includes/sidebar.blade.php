<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li>
                    <a class=" waves-effect waves-dark" href="{{route('dashboard')}}"  aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">Minimal </a></li>
                        <li><a href="index2.html">Analytical</a></li>
                        <li><a href="index3.html">Demographical</a></li>
                        <li><a href="index4.html">Modern</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i><span class="hide-menu">Category Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('category.add')}}">Add Category</a></li>
                        <li><a href="{{route('category.manage')}}">Manage Category</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-email"></i><span class="hide-menu">Sub Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('sub-category.add')}}">Add SubCategory</a></li>
                        <li><a href="{{route('sub-category.manage')}}">Manage SubCategory</a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-palette"></i><span class="hide-menu">Brand Module</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('brand.add')}}">Add Brand</a></li>
                        <li><a href="{{route('brand.manage')}}">Manage Brand</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Unit Module</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('unit.add')}}">Add Unit</a></li>
                        <li><a href="{{route('unit.manage')}}">Manage Unit</a></li>


                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-accordion-merged"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('product.add')}}">Add Product</a></li>
                        <li><a href="{{route('product.manage')}}">Manage Product</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-settings"></i>
                        <span class="hide-menu">Order Module</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.all-order')}}">Manage Order</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-gallery"></i><span class="hide-menu">Customer</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="layout-single-column.html">Manage Customer</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-files"></i><span class="hide-menu">User MOdule</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Add User</a></li>
                        <li><a href="pages-blank.html">Manage User</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-pie-chart"></i><span class="hide-menu">Coupon Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="chart-morris.html">Add Coupon</a></li>
                        <li><a href="chart-chartist.html">Manage Coupon</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-light-bulb"></i><span class="hide-menu">Setting</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Company Setting</a></li>
                        <li><a href="icon-fontawesome.html">Tax Setting</a></li>
                        <li><a href="icon-themify.html">Shipping Setting</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
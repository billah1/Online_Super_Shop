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
                        <i class="ti-layout-accordion-merged"></i>
                        <span class="hide-menu">Book Module</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('book.add')}}">Add Book</a></li>
                        <li><a href="{{route('book.manage')}}">Manage Book</a></li>
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



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

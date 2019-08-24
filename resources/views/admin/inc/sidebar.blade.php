            <nav id="column_left">  
              <ul class="nav nav-list">
                  <li><h4>Dashboard</h4></li> 
                  <li class="{{ Request::path() == 'admin/slide' ? 'active' : '' }} {{ Request::path() == 'admin/slide/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#slider">
                        <span class="nav-header-primary">Slider <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="slider">
                      <li><a href="{{ url('/admin/slide') }}">Slide List</a></li>
                      <li><a href="{{ url('/admin/slide/create') }}">Create Slide</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == '/admin/shop' ? 'active' : '' }} {{ Request::path() == '/admin/shop/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#shop">
                        <span class="nav-header-primary">Shop <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="shop">
                      <li><a href="{{ url('/admin/shop') }}">Shop List</a></li>
                      <li><a href="{{ url('/admin/shop/create') }}">Create Shop</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/product/category' ? 'active' : '' }} {{ Request::path() == 'admin/product/category/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#category">
                        <span class="nav-header-primary">Category <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="category">
                      <li><a href="{{ url('/admin/product/category') }}">Category List</a></li>
                      <li><a href="{{ url('/admin/product/category/create') }}">Create Category</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/product/brand' ? 'active' : '' }} {{ Request::path() == 'admin/product/brand/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#brand">
                        <span class="nav-header-primary">Brand <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="brand">
                      <li><a href="{{ url('/admin/product/brand') }}">Brand List</a></li>
                      <li><a href="{{ url('/admin/product/brand/create') }}">Create Brand</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/product/color' ? 'active' : '' }} {{ Request::path() == 'admin/product/color/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#color">
                        <span class="nav-header-primary">Color <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="color">
                      <li><a href="{{ url('/admin/product/color') }}">Color List</a></li>
                      <li><a href="{{ url('/admin/product/color/create') }}">Create Color</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/product/item' ? 'active' : '' }} {{ Request::path() == 'admin/product/item/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#item">
                        <span class="nav-header-primary">Item <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="item">
                      <li><a href="{{ url('/admin/product/item') }}">Item List</a></li>
                      <li><a href="{{ url('/admin/product/item/create') }}">Create Item</a></li>
                    </ul>
                  </li>

                  <li class="{{ Request::path() == 'admin/offer' ? 'active' : '' }}">
                    <a href="{{ url('/admin/offer') }}">Offer List</a>
                  </li>

                  <li class="{{ Request::path() == 'admin/email' ? 'active' : '' }}"><a href="{{ url('/admin/email') }}">Email List</a></li>

                  <li class="{{ Request::path() == 'admin/banner' ? 'active' : '' }} {{ Request::path() == 'admin/banner/create' ? 'active' : '' }}">
                    <a class="accordion-heading" data-toggle="collapse" data-target="#banner">
                        <span class="nav-header-primary">Banner <span class="pull-right"><b class="caret"></b></span></span>
                    </a>
                    <ul class="nav nav-list collapse" id="banner">
                      <li><a href="{{ url('/admin/banner') }}">Banner List</a></li>
                      <li><a href="{{ url('/admin/banner/create') }}">Create Banner</a></li>
                    </ul>
                  </li>

              </ul>
            </nav>
 <aside class="main-sidebar sidebar-dark-primary elevation-4 slimScrollBar">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
      <img src="{{asset($setting->favicon)}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bangabandhu Chair</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Auth::user()->avatar)}}" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @if(Auth::user()->user==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->category==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('childcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->slider==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('manage.slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Sliders</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->notice==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Notice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('manage.notice')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Notice</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->about==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                About
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('about.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage About</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cp.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->gallery==1)
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('video.gallery')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('photo.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Photo</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->event==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Event</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->administration==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Administration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ad.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('member.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Members</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->researcher==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Researcher
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('professor.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculties</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('honor.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Honor Board</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->archive==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Archive
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('archive.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->publication==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Publication
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('publication.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Publication</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('artical.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artical</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('advisor.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advisor</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('board.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editor Board</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->author==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-toggle-on"></i>
              <p>
                Author
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('author.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Author</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->newsletter==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Newsletter
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('newsletter.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Newsletters</p>
                </a>
              </li>
            </ul>   
          </li>
          @endif
          @if(Auth::user()->setting==1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('seo.setting')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('website.setting')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('page.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('smtp.setting')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMTP Setting</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-header">PROFILE</li>
          <li class="nav-item">
            <a href="{{route('admin.password.change')}}" class="nav-link">
              <i class="nav-icon far fa fa-key text-info"></i>
              <p class="text">Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link" id="logout">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
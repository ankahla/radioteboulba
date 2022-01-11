<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('article_category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.article-categories.index") }}" class="nav-link {{ request()->is('admin/article-categories') || request()->is('admin/article-categories/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-th-large">

                            </i>
                            <p>
                                {{ trans('cruds.articleCategory.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('news_category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.news-categories.index") }}" class="nav-link {{ request()->is('admin/news-categories') || request()->is('admin/news-categories/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-th-large">

                            </i>
                            <p>
                                {{ trans('cruds.newsCategory.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('news_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.news.index") }}" class="nav-link {{ request()->is('admin/news') || request()->is('admin/news/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon far fa-newspaper">

                            </i>
                            <p>
                                {{ trans('cruds.news.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('article_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.articles.index") }}" class="nav-link {{ request()->is('admin/articles') || request()->is('admin/articles/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-file-alt">

                            </i>
                            <p>
                                {{ trans('cruds.article.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('fans_message_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.fans-messages.index") }}" class="nav-link {{ request()->is('admin/fans-messages') || request()->is('admin/fans-messages/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fab fa-facebook-messenger">

                            </i>
                            <p>
                                {{ trans('cruds.fansMessage.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('radio_program_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.radio-programs.index") }}" class="nav-link {{ request()->is('admin/radio-programs') || request()->is('admin/radio-programs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.radioProgram.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

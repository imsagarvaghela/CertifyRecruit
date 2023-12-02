<aside class="main-sidebar elevation-4" style="background: linear-gradient(96deg, #07E2FA 0%, #3650F1 100%); color:azure">
            <a href="{{ url('/dashboard') }}" class="brand-link" style="border-bottom: 1px solid #E2E8F0">
                <img src="{{ url('storage/images/logo2.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @include('layouts.menu')
                    </ul>
                </nav>
            </div>
        </aside>
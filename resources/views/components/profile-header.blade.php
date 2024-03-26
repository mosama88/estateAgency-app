<div>
                        {{-- logout --}}

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{auth()->user()->image}}"
                                    alt="Header Avatar">
                                    @if(auth()->check())
                                        <span class="mx-1 fw-normal">{{auth()->user()->name}}</span>
                                    @else
                                        Hello Guest!
                                    @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('dashboard.users.show', auth()->user()->id) }}"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> صفحتى</a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> الأعدادات<span class="badge bg-success ms-auto">11</span></a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> قفل الشاشة</a>
                                <div class="dropdown-divider"></div>

                                @if(Auth::check())
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
                            </form>
                            <a href="#" class="dropdown-item text-center text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                خروج  <i class="fas fa-sign-out-alt"></i> </a>
@else
    <a class="dropdown-item text-center text-danger" href="{{ route('login') }}">الدخول</a>
@endif
</div>
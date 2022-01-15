@auth
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0" style="margin: 0 85px 0 0 !important;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">الرئيسية</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="أكتب ما ترغب بالبحث عنه.."
                        aria-label="Search">
                    <i class="fas fa-search"></i>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/user.png" alt=""> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('settings') }}">الاعدادات</a></li>
                            <li><a class="dropdown-item" href="{{ route('dealerSales') }}">مبيعاتي</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                            <span class="navbar-text">
                                <a type="button" class="dropdown-item btn btn-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>
                            </span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#"><img src="images/noti-ic.png" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endauth

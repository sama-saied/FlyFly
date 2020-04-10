<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('frontdivi/img/logo.png') }}" alt="logo">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ...."/>
							<button><i class="flaticon-search"></i></button>
						</form>
                    </div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
                        <div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>{{ $cartCount }}</span>
								</div>
								<a href="{{ route('checkout.cart') }}">Shopping Cart</a>
                            </div>
                        @guest
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="{{ route('login') }}">Sign In</a> or <a href="{{ route('register') }}">Create Account</a>
                            </div>
                            @else
                            <div class="up-item">
								<i class="flaticon-profile"></i>
                                    <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->full_name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
						</div>
					</div>
				</div>
			</div>
        </div>
        @include('site.partials.nav')
</header>
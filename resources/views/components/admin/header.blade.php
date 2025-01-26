
<header class="admin-header">
    <nav class="admin-nav-bar">
        <div class="avatar-name uppercase ml-10 text-black font-bold text-sm">
            <div class="admin-avatar shadow-2xl">
                <img src="{{ img_a_url('avatar-m5.jpg') }}" alt="">
            </div>
            <p class="admin-name text-ellipsis w-48 text-black overflow-hidden whitespace-nowrap italic">
                @if (Auth::user()->idRol === 2)
                    {{ Auth::user()->name . ' ' . Auth::user()->lastname }}
                @else
                    Administrator
                @endif
            </p>
        </div>

        <div class="dbt w-full text-start text-[#fff] font-black text-5xl uppercase">
            DASHBOARD
        </div>

        <div class="logo shadow-xl">
            <a href="{{ route('home') }}">
                <img src="{{ img_d_url('logo-removebg-preview.png') }}" alt="">
            </a>
        </div>
    </nav>
</header>

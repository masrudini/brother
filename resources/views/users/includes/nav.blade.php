<!-- Header -->
<header id="header" class="alt">
    <a href="/dashboard" class="logo"><strong>Brother Transport</strong></a>
    <nav>
        <a href="#menu">Welcome, {{ auth()->user()->name }}</a>
    </nav>
</header>

<!-- Menu -->
<nav id="menu">
    <ul class="links">
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/dashboard/profile">Profile</a></li>
        <li><a href="/order/pay">Belum Dibayar</a></li>
        <li><a href="/order/confirm">Menunggu Konfirmasi</a></li>
        <li><a href="/order/confirmed">Sudah Terkonfirmasi</a></li>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </ul>
</nav>

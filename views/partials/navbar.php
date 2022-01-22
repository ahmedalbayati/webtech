<nav>
    <a href="/" class="btn-primary">FORUM NAME</a>

    <div class="nav-right">
        <?php if (Auth::is_logged_in()) { ?>
            <a href="/" class="btn-primary">Profile</a>
            <a href="/logout" class="btn-primary">Log out</a>
        <?php } else { ?>
            <a href="/login" class="btn-primary">Login</a>
            <a href="/register" class="btn-primary">Register</a>
        <?php } ?>
    </div>
</nav>

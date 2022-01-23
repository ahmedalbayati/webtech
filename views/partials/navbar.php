<nav>
    <a href="/" class="btn-primary">FORUM NAME</a>

    <div class="nav-right">
        <?php if (Auth::is_logged_in()) { ?>
            <span onclick="toggleDropdown()">
                <i class="fas fa-user-circle fa-2x" style="cursor: pointer;"></i>
            </span>

            <div class="nav-dropdown" style="display: none;">
                <a>Profile</a><br>

                <?php if (Auth::is_admin()) { ?>
                <a href="/dashboard">Dashboard</a><br>
                <?php } ?>

                <a href="/logout">Log out</a>
            </div>
        <?php } else { ?>
            <a href="/login" class="btn-primary">Login</a>
            <a href="/register" class="btn-primary">Register</a>
        <?php } ?>
    </div>
</nav>

<nav>
    <a href="/"><img src="" alt="" >FORUM NAME</a>

    <div class="nav-right">
        <?php if (isset($_SESSION['user'])) { ?>
            <a href="/">Profile</a>
            <a href="/logout">Log out</a>
        <?php } else { ?>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        <?php } ?>
    </div>
</nav>

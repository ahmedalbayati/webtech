<h1>Dashboard</h1>

<ul class="nav-vertical">
    <li class="nav-vertical-item">
        <a href="#" onclick="ajaxSwitchPage('edit-topics', 'page');">edit topics</a>
    </li>
    <li class="nav-vertical-item">
        <a href="#" onclick="ajaxSwitchPage('approve-messages', 'page');">approve messages</a>
    </li>
    <li class="nav-vertical-item">
        <a href="#" onclick="ajaxSwitchPage('forum-settings', 'page');">forum settings</a>
    </li>
</ul>

<div id="page"></div>

<script>
    window.onload = function () {
        ajaxSwitchPage('edit-topics', 'page');
    }
</script>

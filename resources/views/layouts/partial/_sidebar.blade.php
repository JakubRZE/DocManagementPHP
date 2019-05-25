
    <ul class="sidebar navbar-nav">
        <li class="nav-item" id="Dashboard">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item" id="Documents">
            <a class="nav-link" href="{{ url('/documents') }}">
                <i class="far fa-file-alt"></i>
                <span>&nbsp;Documents</span>
            </a>
        </li>
        <li class="nav-item" id="Activity">
            <a class="nav-link"  href="{{ url('/activity') }}">
                <i class="far fa-bookmark"></i>
                <span>&nbsp;My activity</span>
            </a>
        </li>
        <li class="nav-item" id="Create">
            <a class="nav-link"  href="{{ url('/documents/create') }}">
                <i class="fas fa-folder-plus"></i>
                <span>Add new document</span>
            </a>
        </li>
    </ul>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript">
        $(document).ready(function () {
            if (window.location.href.includes("dashboard"))
                $("#Dashboard").addClass("active");
            if (window.location.href.includes("documents") && !window.location.href.includes("create"))
                $("#Documents").addClass("active");
            if (window.location.href.includes("activity"))
                $("#Activity").addClass("active");
            if (window.location.href.includes("create"))
                $("#Create").addClass("active");
        });
    </script>
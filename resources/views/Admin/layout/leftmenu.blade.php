<div class="dash-nav dash-nav-dark">
    <header>
        <a href="javascript::void()" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="/views/admin/pages/home" class="easion-logo"><img src=" {{ asset('images/logo.png') }}" alt="" height="50" width="120"></a>

    </header>
    <p class="text-center bg-primary text-dark">Version 1.0.0</p>
    <div style="display: flex; justify-content: center;">
        <img class="rounded-circle centered-icons" src=" {{ asset('images/admin.png') }}" alt="" width="50px" height="50px">
    </div>
    <p class="text-center mt-4 text-light"></p>

    <nav class="dash-nav-list">
        <a href="/views/admin/pages/home" class="dash-nav-item">
            <i class="fas fa-home"></i> Thống kê </a>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-users"></i> Tài khoản </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/views/admin/pages/user/list" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="/views/admin/pages/user/add" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>

        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-cube"></i>Sản phẩm </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/views/admin/pages/product/list" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="/views/admin/pages/product/add" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>

        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-comments"></i> Đánh giá </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/views/admin/pages/comment/list" class="dash-nav-dropdown-item">Danh sách</a>
            </div>
        </div>

        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-cube"></i></i> Đơn hàng </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/views/admin/pages/order/list" class="dash-nav-dropdown-item">Danh sách</a>
            </div>
        </div>

        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-book"></i></i> Bài viết </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/views/admin/pages/blogs/list" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="/views/admin/pages/blogs/add" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>

    </nav>

</div>

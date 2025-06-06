<nav class=" bg-white shadow-md px-4 py-3">
      <div class="flex justify-between item-center">
      <div class="text-2xl text-green-900 hover:text-blue-500 cursor-pointer">
            Quiz System </div>
        <div class=" space-x-4">
        <a class="text-green-900 hover:text-blue-500" href="/">Home</a>
            <a class="text-green-900 hover:text-blue-500" href="/categories-list">Chủ Đề</a>
            @if(session('user'))
            <a class="text-green-900 hover:text-blue-500" href="/user-details">Welcome {{session('user')->name}}</a>
            <a class="text-green-900 hover:text-blue-500" href="/user-logout">Đăng xuất</a>
            @else
            <a class="text-green-900 hover:text-blue-500" href="/user-login">Đăng nhập</a>
            <a class="text-green-900 hover:text-blue-500" href="/user-signup">Đăng ký</a>
  @endif
            <a class="text-green-900 hover:text-blue-500" href="/admin-logout">Admin</a>
        </div>
      </div>
    </nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/userpage.css">
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="/build/assets/Login.png" alt="Profile Picture">
            <div class="username">
                <p>{{ session('user')->name ?? 'Guest' }}</p>
                <p>{{ session('user')->email ?? '' }}</p>
            </div>
        </div>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="background:none; border:none; padding:0; cursor:pointer; display:flex; align-items:center;">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000ff">
                <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
            </svg>
            Logout
        </button>
    </form>
</li>
</ul>
    </div>
 
    <!-- <div class="profile">
        <h1>Welcome, {{ session('user')->name ?? 'Guest' }}</h1>
        <p>You are logged in as {{ session('user')->username ?? '' }}</p>
    </div> -->
</body>
</html>
<?php $user = session()->get('user_login'); ?>

<!-- <div class="wrapper" style="display:flex"> -->
<style>
    header {
        background-color: var(--primColor);
        color: var(--textColor);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 21px;
        margin-left: 70px;
        height: 59px;
    }
    
    header div {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    :root {
        --primColor: #511d43;
        --secndColor: #901e3e;
        --textColor: #f0e7e7;
        --baseColor: #dc2525;
        --baseColor2: #9bc09c;
    }
    header,
    button,
    input[type="submit"],
    label,
    h1,
    a,
    p {
        font-family: "Bebas Neue", sans-serif;
    }

    input[type="text"] {
        font-family: "Roboto", sans-serif;
    }

    main,
    header {
        margin-left: 250px;
        transition: margin-left 0.5s;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #432f5eff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        display: block;
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #ffffff;
        transition: 0.3s;
        background-color: transparent;
        white-space: nowrap;
    }

    .sidebar a:hover,
    .sidebar svg:hover {
        color: #000000ff;
        background-color: #ffffff;
    }

    .sidebar .label,
    .sidebar svg {
        display: inline-block;
        vertical-align: middle;
    }

    .sidebar .label {
        margin-left: 10px;
    }

    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }
</style>

<div id="sidebar" class="sidebar">

    <a href="/">
        <svg viewBox="0 0 15 15" width="30px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z"></path>
            </g>
        </svg>
        <span class="label">Dashboard</span></a>

    <?php if (isset($user) && $user['user_type'] == 1): ?>
        <a href="users">
            <svg viewBox="0 0 15 15" width="30px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"></path>
                    <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"></path>
                </g>
            </svg>
            <span class="label">Users</span></a>
    <?php endif; ?>

    <a href="assign-task">
        <svg viewBox="2 2 20 20" width="30px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M6 6H10V4H4V10H6V6Z"></path>
                <path d="M10 18H6V14H4V20H10V18Z"></path>
                <path d="M14 6H18V10H20V4H14V6Z"></path>
                <path d="M14 18H18V14H20V20H14V18Z"></path>
                <path d="M12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5Z"></path>
            </g>
        </svg>
        <span class="label">Assign Task</span></a>

    <a href="/logout">
        <svg viewBox="0 0 19 19" width="30px" fill="currentColor    " xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.125 12C16.125 11.5858 15.7892 11.25 15.375 11.25L4.40244 11.25L6.36309 9.56944C6.67759 9.29988 6.71401 8.8264 6.44444 8.51191C6.17488 8.19741 5.7014 8.16099 5.38691 8.43056L1.88691 11.4306C1.72067 11.573 1.625 11.7811 1.625 12C1.625 12.2189 1.72067 12.427 1.88691 12.5694L5.38691 15.5694C5.7014 15.839 6.17488 15.8026 6.44444 15.4881C6.71401 15.1736 6.67759 14.7001 6.36309 14.4306L4.40244 12.75L15.375 12.75C15.7892 12.75 16.125 12.4142 16.125 12Z"></path>
                <path d="M9.375 8C9.375 8.70219 9.375 9.05329 9.54351 9.3055C9.61648 9.41471 9.71025 9.50848 9.81946 9.58145C10.0717 9.74996 10.4228 9.74996 11.125 9.74996L15.375 9.74996C16.6176 9.74996 17.625 10.7573 17.625 12C17.625 13.2426 16.6176 14.25 15.375 14.25L11.125 14.25C10.4228 14.25 10.0716 14.25 9.8194 14.4185C9.71023 14.4915 9.6165 14.5852 9.54355 14.6944C9.375 14.9466 9.375 15.2977 9.375 16C9.375 18.8284 9.375 20.2426 10.2537 21.1213C11.1324 22 12.5464 22 15.3748 22L16.3748 22C19.2032 22 20.6174 22 21.4961 21.1213C22.3748 20.2426 22.3748 18.8284 22.3748 16L22.3748 8C22.3748 5.17158 22.3748 3.75736 21.4961 2.87868C20.6174 2 19.2032 2 16.3748 2L15.3748 2C12.5464 2 11.1324 2 10.2537 2.87868C9.375 3.75736 9.375 5.17157 9.375 8Z"></path>
            </g>
        </svg>
        <span class="label">Logout</span></a>
</div>

<script>
    $(document).ready(function() {

        const sidebar = $('#sidebar');
        const main_and_header = $('main, header');
        const sidebar_a = $('.sidebar a');
        const sidebar_a_label = $('.sidebar .label');
        const header_and_main = $('header, main');

        // show sidebar
        sidebar.on('mouseenter', function() {
            $(this).css('width', '250px');
            main_and_header.css('margin-left', '250px');
            sidebar_a.css('padding', '8px 8px 8px 32px');
            sidebar_a_label.fadeIn(200);
        })

        // hide sidebar
        header_and_main.on('mouseenter', function() {
            sidebar.css('width', '70px');
            main_and_header.css('margin-left', '70px');
            sidebar_a.css('padding', '8px 8px 8px 13px');
            sidebar_a_label.fadeOut(200);
        })

    });

    // function openNav() {
    //   document.getElementById("sidebar").style.width = "250px";
    //   document.querySelector("main").style.marginLeft = "250px";
    // }
</script>

<!-- <aside>
        <nav>
            <ul>
                <li><a href="/">Dashboard</a></li>
                
                <php if (isset($user) && $user['user_type'] == 1): ?>
                    <li><a href="#">Users</a></li>
                <php endif; ?>
                
                <li><a href="/logout">Assign Task</a></li>

                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </aside> -->

<!-- </div> -->
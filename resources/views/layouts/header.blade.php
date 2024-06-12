<style>
    .icon-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        color: #f6f6f6;
        background: #3c59ff;
        border: none;
        outline: none;
        border-radius: 50%;
    }

    .icon-button:hover {
        cursor: pointer;
    }
    .icon-button:active {
        background: #cccccc;
    }
    .icon-button__badge {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 18px;
        height: 18px;
        background: rgb(233, 223, 223);
        color: black;
        display: flex;
        font-weight: bold ;
        justify-content: center;
        align-items: center;
        font-size: 10px;
        border-radius: 50%;
    }
</style>

<header>
    <div class="navbars">
        <ul class="navbars-nav">
            <li class="navs-item">
                <a class="navs-link">
                    <i class='bx bx-menu bar_menu'></i>
                </a>
            </li>
        </ul>
        <div class="navbars__title" style="margin-top:8px;">
            Surva
            <div style="margin-top: -10px;">
            <span style="font-size: 12px;"> Aplikasi Analisis Data survei </span>
            </div>
        </div>
    </div>
</header>


<div class="sidebar closes">
    <ul class="nav-links">
        <li class="mt-4">
            <div class="icon-links">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" style="width: 65px">
                        <span style="margin-left: 27px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3H10V12H3V3ZM14 3H21V8H14V3ZM14 12H21V21H14V12ZM3 16H10V21H3V16Z" stroke="{{ request()->routeIs('index') ? '#3c59ff' : '#b4b4b4' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    <a><span class="link_name ms-1 fs-6 {{ request()->routeIs('index') ? 'text-primary' : '' }}" style="width: 10px; white-space: nowrap; color:#3c59ff">Analisis Data</span></a>
                </div>
                <a href="javascript:void(0)"><i class="bx bxs-chevron-down arrow"></i></a>
            </div>
            <ul class="sub_menu">
                <li><a class="link_name {{ request()->routeIs('index') ? 'text-primary' : '' }}" href="javascript:void(0)">Analisis Data</a></li>
                <li><a class="fs-6 {{ request()->routeIs('index') ? 'text-primary' : '' }}" href="/">Analisis Data</a></li>
            </ul>
        </li>
        <li class="mt-4">
            <div class="icon-links">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" style="width: 65px">
                        <span style="margin-left: 27px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048"><path fill="{{ request()->routeIs('masterdata') ? '#3c59ff' : '#b4b4b4' }}" d="M960 768q-68 0-144-6t-153-22t-149-41t-130-62v963q0 23 19 43t48 39t66 32t71 25t64 18t46 10q49 9 98 14t100 8v130q-44-2-108-9t-136-22t-142-39t-127-59t-92-82t-35-108V448q0-47 22-86t58-69t83-55t95-41t95-28t84-18q66-12 133-17t134-6q67 0 134 5t133 18q36 7 83 18t95 28t95 41t83 54t59 70t22 86v448h-128V637q-59 37-130 62t-148 40t-153 22t-145 7m0-512q-57 0-130 6t-148 20t-143 40t-115 63q-14 11-27 27t-13 36q0 19 13 35t27 28q46 38 114 63t143 39t148 21t131 6q57 0 130-6t148-20t143-40t114-63q14-11 27-27t14-36q0-19-13-35t-28-28q-46-38-114-63t-142-39t-148-21t-131-6m1088 739v1053H1024V999l304 401l210-380l211 380zm-128 389l-186 253l-196-353l-194 350l-192-254v540h768z"/></svg>
                        </span>
                    </a>
                    <a><span class="link_name ms-1 fs-6 {{ request()->routeIs('masterdata') ? 'text-primary' : '' }}" style="width: 10px; white-space: nowrap; color:#3c59ff">Master Data</span></a>
                </div>
                <a href="javascript:void(0)"><i class="bx bxs-chevron-down arrow"></i></a>
            </div>
            <ul class="sub_menu">
                <li><a class="link_name {{ request()->routeIs('masterdata') ? 'text-primary' : '' }}" href="javascript:void(0)">Master Data</a></li>
                <li><a class="fs-6 {{ request()->routeIs('masterdata') ? 'text-primary' : '' }}" href="/masterdata">Master Data</a></li>
            </ul>
        </li>
    </ul>
</div>
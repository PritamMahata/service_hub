<nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>
    <div class="menu-top">
        <h2 class="menu-title">Menu</h2>
        <button class="menu-close-btn" data-mobile-menu-close-btn>
            <span class="material-symbols-rounded">close</span>
        </button>
    </div>
    <ul class="mobile-menu-category-list ">
        <li class="menu-category sidebyside">
            <a href="./index.php" class="menu-title"><span class="material-symbols-rounded">home</span>Home</a>
        </li>
        <?php
        if ($isLoggedIn) { ?>
            <li class="menu-category sidebyside">
                <a href="./profile.php" class="menu-title"><span class="material-symbols-rounded">Person</span>Profile</a>
            </li>
        <?php } ?>
        <li class="menu-category sidebyside">
            <a href="./category.php" class="menu-title"><span class="material-symbols-rounded">view_list</span>Category</a>
        </li>
        
        <!-- <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">option 1</p>
                <div>
                    <span class="material-symbols-rounded add-icon">keyboard_arrow_down</span>
                    <span class="material-symbols-rounded remove-icon">keyboard_arrow_up</span>
                </div>
            </button>
            <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
            </ul>
        </li>
        <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">option 2</p>
                <div>
                    <span class="material-symbols-rounded add-icon">keyboard_arrow_down</span>
                    <span class="material-symbols-rounded remove-icon">keyboard_arrow_up</span>
                </div>
            </button>
            <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
            </ul>
        </li>
        <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">option 3</p>
                <div>
                    <span class="material-symbols-rounded add-icon">keyboard_arrow_down</span>
                    <span class="material-symbols-rounded remove-icon">keyboard_arrow_up</span>
                </div>
            </button>
            <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
            </ul>
        </li>
        <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">option 4</p>
                <div>
                    <span class="material-symbols-rounded add-icon">keyboard_arrow_down</span>
                    <span class="material-symbols-rounded remove-icon">keyboard_arrow_up</span>
                </div>
            </button>
            <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
                <li class="submenu-category">
                    <a href="#" class="submenu-title">Lorem ipsum</a>
                </li>
            </ul>
        </li> -->

        <li class="menu-category sidebyside">
            <a href="./assets/components/logout.php" class="menu-title"><span class="material-symbols-rounded">contact_support</span>Contact Us</a>
        </li>
        <li class="menu-category sidebyside">
            <a href="./assets/components/logout.php" class="menu-title"><span class="material-symbols-rounded">logout</span>Logout</a>
        </li>
    </ul>
</nav>
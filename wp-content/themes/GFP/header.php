<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Farm Parts</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <!-- EYEBROW -->
    <section class="eyebrow">
        <div class="site-width">
            <ul class="eyebrow-links">
                <?php
                  wp_nav_menu(
                    array(
                      'menu' => 'eyebrow_quick_links',
                    )
                  );
                ?>
            </ul>
        </div>
    </section>

    <!-- SITE-HEADER -->
    <div class="site-header-container">
        <header class="site-header">
            <div class="site-header-logo-container">
                <a href="/"><img src="/wp-content/themes/GFP/dist/img/GFP-logo.png" alt="GreenFarmParts"></a>
            </div>
            <nav class="site-navigation--header" role="navigation">
                <?php echo get_product_search_form(); ?>
                <ul class="site-header-list">
                    <li>
                        <button id="toggleShopByPart">Shop By Part</button>
                        <?php
                          wp_nav_menu(
                            array(
                              'menu' => 'shop-by-part',
                            )
                          );
                        ?>
                    </li>
                    <!-- <li>
                        <button>Shop By Equipment</button>
                    </li>
                    <li>
                        <a href="#0">Parts Diagram</a>
                    </li>
                    <li class="shopping-cart-list-item"><a href="#0"><img src="/v/vspfiles/templates/gfp-test/img/cart-icon.jpg" alt=""></a></li> -->
                </ul>
            </nav>
            <div class="menu-toggle-container">
                <button id="toggleMenu">Menu</button>
                <!-- <button id="hamburger" class="hamburger hamburger--spin menu-toggle" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button> -->
            </div>
        </header>
        <div class="site-header-searchbar">
            search
        </div>
    </div>

    <!-- MAIN CONTAINER -->
    <main <?php post_class(); ?>>
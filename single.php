<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!is_singular('post')) {
    include get_index_template();
    return;
}

while (have_posts()) : the_post();
    $home_options     = hcmv_child_get_options();
    $post_options     = hcmv_child_get_post_options();
    $site_name        = get_bloginfo('name') ?: 'HCM City University Village';
    $custom_logo_id   = get_theme_mod('custom_logo');
    $logo_url         = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'thumbnail') : '';
    $home_url         = home_url('/');
    $footer_brand     = !empty($home_options['footer_brand']) ? $home_options['footer_brand'] : $site_name;
    $copyright        = str_replace('%year%', date_i18n('Y'), $home_options['footer_copyright']);
    $raw_content      = apply_filters('the_content', get_the_content());
    list($post_html, $toc_items) = hcmv_child_generate_toc_and_content($raw_content);
    $reading_time     = hcmv_child_calculate_reading_time(get_post_field('post_content', get_the_ID()));
    $sidebar_posts    = hcmv_child_get_sidebar_posts(get_the_ID());
    $map_image        = hcmv_child_get_image_url(
        $post_options['sidebar_map_image_id'],
        hcmv_child_svg_placeholder('Bản đồ Làng Đại học', '#dff1d8', '#edf8ea', '#3a7d32')
    );
    $breadcrumbs      = hcmv_child_breadcrumb_items(get_the_ID());
    $categories       = get_the_category();
    $post_url         = get_permalink();
    $share_facebook   = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($post_url);
    $share_zalo       = 'https://zalo.me/share?url=' . rawurlencode($post_url);
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('hcmv-single-post-body'); ?>>
<?php wp_body_open(); ?>

<div class="hcmv-wrap hcmv-post-wrap">
    <div class="hcmv-shell">
        <header class="hcmv-topbar">
            <div class="hcmv-container hcmv-topbar-inner">
                <a class="hcmv-brand-wrap" href="<?php echo esc_url($home_url); ?>">
                    <?php if ($logo_url) : ?>
                        <span class="hcmv-brand-logo">
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>">
                        </span>
                    <?php endif; ?>
                    <span class="hcmv-brand"><?php echo esc_html($site_name); ?></span>
                </a>

                <nav class="hcmv-nav" aria-label="Primary navigation">
                    <?php
                    if (has_nav_menu('hcmv_primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'hcmv_primary',
                            'container'      => false,
                            'menu_class'     => 'hcmv-nav-menu',
                            'fallback_cb'    => false,
                        ));
                    } else {
                        echo '<ul class="hcmv-nav-menu"><li><a href="' . esc_url(hcmv_child_posts_url()) . '">Handbooks</a></li><li><a href="#">Resources</a></li><li><a href="' . esc_url(hcmv_child_posts_url()) . '">News</a></li></ul>';
                    }
                    ?>
                </nav>

                <div class="hcmv-actions">
                    <form class="hcmv-search" action="<?php echo esc_url($home_url); ?>" method="get">
                        <span aria-hidden="true">🔍</span>
                        <input type="search" name="s" placeholder="<?php echo esc_attr($home_options['search_placeholder']); ?>">
                    </form>

                    <a class="hcmv-btn hcmv-btn-primary" href="<?php echo esc_url(hcmv_child_posts_url()); ?>">
                        Bắt đầu từ đây
                    </a>
                </div>
            </div>
        </header>

        <main class="hcmv-post-main">
            <section class="hcmv-post-hero">
                <div class="hcmv-container">
                    <nav class="hcmv-breadcrumbs" aria-label="Breadcrumb">
                        <?php foreach ($breadcrumbs as $index => $crumb) : ?>
                            <?php if ($index > 0) : ?>
                                <span class="hcmv-breadcrumb-sep">›</span>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($crumb['url']); ?>"><?php echo esc_html($crumb['label']); ?></a>
                        <?php endforeach; ?>
                        <span class="hcmv-breadcrumb-sep">›</span>
                        <span class="is-current"><?php echo esc_html(get_the_title()); ?></span>
                    </nav>

                    <h1 class="hcmv-post-title"><?php the_title(); ?></h1>

                    <div class="hcmv-post-meta-row">
                        <div class="hcmv-post-author">
                            <span class="hcmv-post-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 56); ?>
                            </span>
                            <div>
                                <strong><?php the_author(); ?></strong>
                                <div class="hcmv-post-submeta">
                                    <?php echo esc_html(get_the_date('d/m/Y')); ?> • <?php echo esc_html($reading_time); ?> phút đọc
                                </div>
                            </div>
                        </div>

                        <div class="hcmv-post-actions">
                            <a href="#hcmv-toc" aria-label="Đi tới mục lục">🔖</a>
                            <a href="#hcmv-share" aria-label="Chia sẻ bài viết">↗</a>
                        </div>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <figure class="hcmv-post-featured">
                            <?php the_post_thumbnail('full', array('loading' => 'eager')); ?>
                        </figure>
                    <?php endif; ?>
                </div>
            </section>

            <section class="hcmv-post-content-area">
                <div class="hcmv-container hcmv-post-layout">
                    <article class="hcmv-article-card">
                        <?php if (!empty($toc_items)) : ?>
                            <div class="hcmv-toc-box" id="hcmv-toc">
                                <div class="hcmv-toc-head">
                                    <strong><?php echo esc_html($post_options['toc_title']); ?></strong>
                                    <span>⌄</span>
                                </div>
                                <ol class="hcmv-toc-list">
                                    <?php foreach ($toc_items as $item) : ?>
                                        <li class="level-<?php echo esc_attr($item['level']); ?>">
                                            <a href="#<?php echo esc_attr($item['id']); ?>"><?php echo esc_html($item['text']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        <?php endif; ?>

                        <div class="hcmv-article-content">
                            <?php echo $post_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>

                        <div class="hcmv-post-bottom" id="hcmv-share">
                            <div class="hcmv-post-tags">
                                <?php
                                $post_tags = get_the_tags();

                                if (!empty($post_tags)) {
                                    foreach ($post_tags as $tag) {
                                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">#' . esc_html($tag->name) . '</a>';
                                    }
                                } elseif (!empty($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">#' . esc_html($category->name) . '</a>';
                                    }
                                }
                                ?>
                            </div>

                            <div class="hcmv-post-share">
                                <span><?php echo esc_html($post_options['share_label']); ?></span>
                                <a class="is-facebook" href="<?php echo esc_url($share_facebook); ?>" target="_blank" rel="noopener noreferrer">f</a>
                                <a class="is-zalo" href="<?php echo esc_url($share_zalo); ?>" target="_blank" rel="noopener noreferrer">Zalo</a>
                            </div>
                        </div>
                    </article>

                    <aside class="hcmv-post-sidebar">

                        <!-- Khối 1: Xem nhiều nhất -->
                        <div class="hcmv-side-card">
                            <h3><?php echo esc_html($post_options['sidebar_recent_title']); ?></h3>
                            <div class="hcmv-side-list">
                                <?php foreach ($sidebar_posts as $item) : ?>
                                    <a class="hcmv-side-item" href="<?php echo esc_url($item['url']); ?>">
                                        <small><?php echo esc_html($item['category']); ?></small>
                                        <strong><?php echo esc_html($item['title']); ?></strong>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Khối 2: Bài viết liên quan -->
                        <div class="hcmv-side-card">
                            <?php echo do_shortcode('[hcmv_related_posts]'); ?>
                        </div>

                        <!-- Khối 3: Chủ đề đang Hot -->
                        <div class="hcmv-side-card hcmv-hot-card">
                            <?php hcmv_display_hot_topics(); ?>
                        </div>

                    </aside>
                </div>
            </section>
        </main>

        <footer class="hcmv-footer">
            <div class="hcmv-container">
                <div class="hcmv-footer-grid">

                    <!-- Cột 1: Giới thiệu -->
                    <div class="hcmv-footer-col">
                        <div class="hcmv-footer-brand"><?php echo esc_html($footer_brand); ?></div>
                        <p><?php echo esc_html($home_options['footer_desc']); ?></p>
                    </div>

                    <!-- Cột 2: Chuyên mục -->
                    <div class="hcmv-footer-col">
                        <h4>CHUYÊN MỤC</h4>
                        <?php
                        if (has_nav_menu('hcmv_footer_1')) {
                            wp_nav_menu(array(
                                'theme_location' => 'hcmv_footer_1',
                                'container'      => false,
                                'menu_class'     => 'hcmv-footer-menu',
                                'fallback_cb'    => false,
                            ));
                        } else {
                            echo '<ul class="hcmv-footer-menu"><li><a href="#bai-viet">Ăn uống</a></li><li><a href="#kham-pha">Nhà trọ</a></li><li><a href="#kham-pha">Đi lại</a></li><li><a href="#faq">Học tập</a></li><li><a href="#faq">Việc làm thêm</a></li></ul>';
                        }
                        ?>
                    </div>

                    <!-- Cột 3: Liên hệ -->
                    <div class="hcmv-footer-col">
                        <h4>LIÊN HỆ</h4>
                        <ul class="hcmv-footer-contact">
                            <li>
                                <span class="hcmv-footer-icon" aria-hidden="true">📍</span>
                                <span>Khu đô thị ĐHQG-HCM, Dĩ An, Bình Dương</span>
                            </li>
                            <li>
                                <span class="hcmv-footer-icon" aria-hidden="true">✉️</span>
                                <a href="mailto:hello@langdaihoc.vn">hello@langdaihoc.vn</a>
                            </li>
                            <li>
                                <span class="hcmv-footer-icon" aria-hidden="true">📞</span>
                                <a href="tel:+84000000000">0900 000 000</a>
                            </li>
                        </ul>
                        <div class="hcmv-footer-socials">
                            <a class="hcmv-social-btn hcmv-social-fb" href="#" aria-label="Facebook" rel="noopener noreferrer" target="_blank">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                Facebook
                            </a>
                            <a class="hcmv-social-btn hcmv-social-tt" href="#" aria-label="TikTok" rel="noopener noreferrer" target="_blank">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
                                TikTok
                            </a>
                            <a class="hcmv-social-btn hcmv-social-zalo" href="#" aria-label="Zalo" rel="noopener noreferrer" target="_blank">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V10h2v6zm-1-7a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm5 7h-2v-3.5c0-.83-.67-1.5-1.5-1.5S10 11.67 10 12.5V16H8v-6h2v.93A3.49 3.49 0 0 1 13 9.5c1.93 0 3.5 1.57 3.5 3.5V16z"/></svg>
                                Zalo
                            </a>
                        </div>
                    </div>

                    <!-- Cột 4: Đăng ký nhận tin -->
                    <div class="hcmv-footer-col">
                        <h4>NHẬN BẢN TIN LÀNG ĐH</h4>
                        <p class="hcmv-footer-newsletter-desc">Đăng ký để nhận thông báo về tin tức và cẩm nang mới nhất.</p>
                        <form class="hcmv-footer-subscribe" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                            <input type="hidden" name="action" value="hcmv_subscribe">
                            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
                            <?php wp_nonce_field('hcmv_subscribe', 'hcmv_nonce'); ?>
                            <div class="hcmv-footer-subscribe-row">
                                <input
                                    type="email"
                                    name="subscriber_email"
                                    placeholder="Email của bạn..."
                                    required
                                    aria-label="Địa chỉ email đăng ký nhận bản tin"
                                >
                                <button type="submit" class="hcmv-footer-subscribe-btn">Đăng ký</button>
                            </div>
                        </form>
                    </div>

                </div><!-- .hcmv-footer-grid -->
                <div class="hcmv-copyright"><?php echo esc_html($copyright); ?></div>
            </div>
        </footer>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
<?php endwhile; ?>
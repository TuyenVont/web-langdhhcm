<?php
if (!defined('ABSPATH')) {
    exit;
}

$options         = hcmv_child_get_options();
$site_name       = get_bloginfo('name') ?: 'HCM City University Village';
$custom_logo_id  = get_theme_mod('custom_logo');
$logo_url        = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'thumbnail') : '';
$home_url        = home_url('/');
$hero_image      = hcmv_child_get_image_url($options['hero_image_id'], hcmv_child_svg_placeholder($site_name, '#dbeafe', '#eff6ff', '#2563eb'));
$posts           = hcmv_child_get_posts_data();
$subscribe_state = isset($_GET['subscribed']) ? sanitize_text_field(wp_unslash($_GET['subscribed'])) : '';
$footer_brand    = !empty($options['footer_brand']) ? $options['footer_brand'] : $site_name;
$copyright       = str_replace('%year%', date_i18n('Y'), $options['footer_copyright']);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('hcmv-homepage-body'); ?>>
<?php wp_body_open(); ?>
<div class="hcmv-wrap">
    <div class="hcmv-shell">
        <header class="hcmv-topbar">
            <div class="hcmv-container hcmv-topbar-inner">
                <a class="hcmv-brand-wrap" href="<?php echo esc_url($home_url); ?>">
                    <?php if ($logo_url) : ?>
                        <span class="hcmv-brand-logo"><img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>"></span>
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
                        echo '<ul class="hcmv-nav-menu">';
                        echo '<li><a href="#bai-viet">Ăn uống</a></li>';
                        echo '<li><a href="#kham-pha">Ký túc xá</a></li>';
                        echo '<li><a href="#kham-pha">Đi lại</a></li>';
                        echo '<li><a href="#bai-viet">Học tập</a></li>';
                        echo '<li><a href="#faq">Việc làm</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </nav>

                <div class="hcmv-actions">
                    <form class="hcmv-search" action="<?php echo esc_url($home_url); ?>" method="get">
                        <span aria-hidden="true">🔍</span>
                        <input type="search" name="s" placeholder="<?php echo esc_attr($options['search_placeholder']); ?>">
                    </form>
                    <a class="hcmv-btn hcmv-btn-primary" href="<?php echo esc_url($options['header_cta_url']); ?>"><?php echo esc_html($options['header_cta_text']); ?></a>
                </div>
            </div>
        </header>

        <main class="hcmv-main">
            <section class="hcmv-hero">
                <div class="hcmv-container hcmv-hero-grid">
                    <div>
                        <?php if (!empty($options['hero_badge'])) : ?>
                            <span class="hcmv-badge"><?php echo esc_html($options['hero_badge']); ?></span>
                        <?php endif; ?>
                        <h1><?php echo nl2br(esc_html($options['hero_title'])); ?></h1>
                        <p><?php echo nl2br(esc_html($options['hero_description'])); ?></p>

                        <div class="hcmv-quick-links">
                            <?php foreach ($options['quick_links'] as $quick_link) : ?>
                                <?php if (!empty($quick_link['text'])) : ?>
                                    <a class="hcmv-chip" href="<?php echo esc_url($quick_link['url']); ?>">
                                        <span><?php echo esc_html($quick_link['text']); ?></span>
                                        <span>→</span>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="hcmv-hero-card">
                        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($site_name); ?>">
                        <div class="hcmv-hero-overlay">
                            <small><?php echo esc_html($options['hero_overlay_label']); ?></small>
                            <strong><?php echo esc_html($options['hero_overlay_title']); ?></strong>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hcmv-section" id="bai-viet">
                <div class="hcmv-container">
                    <div class="hcmv-section-head">
                        <div>
                            <h2><?php echo esc_html($options['latest_posts_title']); ?></h2>
                            <p><?php echo esc_html($options['latest_posts_desc']); ?></p>
                        </div>
                        <a class="hcmv-btn hcmv-btn-secondary" href="<?php echo esc_url(hcmv_child_posts_url()); ?>"><?php echo esc_html($options['latest_posts_button_text']); ?></a>
                    </div>

                    <div class="hcmv-post-grid">
                        <?php foreach ($posts as $post_item) : ?>
                            <a class="hcmv-post" href="<?php echo esc_url($post_item['url']); ?>">
                                <div class="hcmv-post-media">
                                    <img src="<?php echo esc_url($post_item['image']); ?>" alt="<?php echo esc_attr($post_item['title']); ?>">
                                    <span class="hcmv-tag"><?php echo esc_html($post_item['tag']); ?></span>
                                </div>
                                <div class="hcmv-post-body">
                                    <h3><?php echo esc_html($post_item['title']); ?></h3>
                                    <p><?php echo esc_html($post_item['excerpt']); ?></p>
                                    <div class="hcmv-post-meta"><?php echo esc_html($post_item['meta']); ?></div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="hcmv-section">
                <div class="hcmv-container">
                    <div class="hcmv-section-head">
                        <div>
                            <h2>Dành riêng cho nhu cầu của bạn</h2>
                            <p>Một thứ bạn có thể quan tâm đến tại đây.</p>
                        </div>
                    </div>

                    <div class="hcmv-audience-grid">
                        <?php foreach ($options['audiences'] as $item) : ?>
                            <?php if (!empty($item['title'])) : ?>
                                <div class="hcmv-audience" style="--audience-color: <?php echo esc_attr($item['color']); ?>;">
                                    <div class="hcmv-audience-icon"><?php echo esc_html($item['icon']); ?></div>
                                    <h3><?php echo esc_html($item['title']); ?></h3>
                                    <p><?php echo esc_html($item['text']); ?></p>
                                    <a class="hcmv-arrow-link" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['label']); ?> <span>→</span></a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="hcmv-section" id="kham-pha">
                <div class="hcmv-container">
                    <div class="hcmv-area-box">
                        <div class="hcmv-area-left">
                            <h2><?php echo esc_html($options['explore_title']); ?></h2>
                            <p><?php echo esc_html($options['explore_desc']); ?></p>
                            <div class="hcmv-pills">
                                <?php foreach ($options['explore_pills'] as $pill) : ?>
                                    <?php if (!empty($pill['text'])) : ?>
                                        <a class="hcmv-pill" href="<?php echo esc_url($pill['url']); ?>"><?php echo esc_html($pill['text']); ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="hcmv-area-map">
                            <a class="hcmv-map-cta" href="<?php echo esc_url($options['explore_button_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($options['explore_button_text']); ?></a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hcmv-faq" id="faq">
                <div class="hcmv-container">
                    <div class="hcmv-faq-title">
                        <h2><?php echo esc_html($options['faq_title']); ?></h2>
                    </div>
                    <div class="hcmv-faq-list">
                        <?php foreach ($options['faqs'] as $faq) : ?>
                            <?php if (!empty($faq['question'])) : ?>
                                <details class="hcmv-faq-item">
                                    <summary><?php echo esc_html($faq['question']); ?></summary>
                                    <div class="hcmv-faq-content"><?php echo nl2br(esc_html($faq['answer'])); ?></div>
                                </details>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="hcmv-newsletter">
                <div class="hcmv-container">
                    <div class="hcmv-newsletter-box">
                        <h2><?php echo esc_html($options['newsletter_title']); ?></h2>
                        <p><?php echo esc_html($options['newsletter_desc']); ?></p>
                        <form class="hcmv-subscribe-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                            <input type="hidden" name="action" value="hcmv_subscribe">
                            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
                            <?php wp_nonce_field('hcmv_subscribe', 'hcmv_nonce'); ?>
                            <input type="email" name="subscriber_email" placeholder="<?php echo esc_attr($options['newsletter_placeholder']); ?>" required>
                            <button class="hcmv-btn hcmv-btn-primary" type="submit"><?php echo esc_html($options['newsletter_button_text']); ?></button>
                        </form>
                        <?php if ('ok' === $subscribe_state) : ?>
                            <div class="hcmv-subscribe-status"><?php echo esc_html($options['newsletter_success']); ?></div>
                        <?php elseif ('invalid' === $subscribe_state) : ?>
                            <div class="hcmv-subscribe-status"><?php echo esc_html($options['newsletter_invalid']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>

        <footer class="hcmv-footer">
            <div class="hcmv-container">
                <div class="hcmv-footer-grid">

                    <!-- Cột 1: Giới thiệu -->
                    <div class="hcmv-footer-col">
                        <div class="hcmv-footer-brand"><?php echo esc_html($footer_brand); ?></div>
                        <p><?php echo esc_html($options['footer_desc']); ?></p>
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
                        <?php
                        // Nếu dùng Contact Form 7: thay bằng do_shortcode('[contact-form-7 id="xxx"]')
                        // Nếu dùng Mailchimp for WP: thay bằng do_shortcode('[mc4wp_form id="xxx"]')
                        // Mặc định dùng form WordPress native:
                        ?>
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

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            <?php echo do_shortcode('[start_here]'); ?>
            <?php echo do_shortcode('[most_viewed]'); ?>

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

            <!-- Cột 1: Brand -->
            <div class="hcmv-footer-col">
                <div class="hcmv-footer-brand">
                    <?php echo esc_html(get_bloginfo('name')); ?>
                </div>
                <p>
                    Cẩm nang sống, học tập & ăn chơi dành cho sinh viên tại Làng Đại học ĐHQG-HCM.
                    Khám phá mọi thứ bạn cần từ ăn uống, nhà trọ đến kinh nghiệm học tập.
                </p>
            </div>

            <!-- Cột 2: Khám phá -->
             <div class="hcmv-footer-col">
                <h4>KHÁM PHÁ</h4>
					<ul class="hcmv-footer-menu">
						<li><a href="<?php echo esc_url(home_url('/an-uong')); ?>">Cẩm nang tân sinh viên</a></li>
						<li><a href="<?php echo esc_url(home_url('/nha-tro')); ?>">Chỗ ở</a></li>
						<li><a href="<?php echo esc_url(home_url('/di-lai')); ?>">Đời sống & tiện ích</a></li>
						<li><a href="<?php echo esc_url(home_url('/hoc-tap')); ?>">Học & làm</a></li>
					</ul>
            </div>

            <!-- Cột 3: Cẩm nang -->
            <div class="hcmv-footer-col">
                <h4>CẨM NANG</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/tan-sinh-vien')); ?>">Tân sinh viên cần biết</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-phi-sinh-hoat')); ?>">Chi phí sinh hoạt</a></li>
                    <li><a href="<?php echo esc_url(home_url('/review-quan-an')); ?>">Review quán ăn</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ky-tuc-xa')); ?>">Ký túc xá</a></li>
                    <li><a href="<?php echo esc_url(home_url('/checklist-nhap-hoc')); ?>">Checklist nhập học</a></li>
                </ul>
            </div>

            <!-- Cột 4: Hỗ trợ -->
            <div class="hcmv-footer-col">
                <h4>HỖ TRỢ</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo esc_url(home_url('/lien-he')); ?>">Liên hệ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat')); ?>">Chính sách bảo mật</a></li>
                    <li><a href="<?php echo esc_url(home_url('/dieu-khoan')); ?>">Điều khoản sử dụng</a></li>
                    <li><a href="<?php echo esc_url(home_url('/sitemap.xml')); ?>">Sitemap</a></li>
                </ul>
            </div>

            <!-- Cột 5: Newsletter -->
            <div class="hcmv-footer-col">
                <h4>NHẬN TIPS SINH VIÊN</h4>
                <p class="hcmv-footer-newsletter-desc">
                    Nhận ngay các tips hữu ích mỗi tuần:
                    ăn ngon – sống rẻ – học tốt – kiếm tiền dễ
                </p>

                <form class="hcmv-footer-subscribe" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="hcmv_subscribe">
                    <?php wp_nonce_field('hcmv_subscribe', 'hcmv_nonce'); ?>

                    <div class="hcmv-footer-subscribe-row">
                        <input
                            type="email"
                            name="subscriber_email"
                            placeholder="Nhập email của bạn..."
                            required
                        >
                        <button type="submit" class="hcmv-footer-subscribe-btn">
                            Đăng ký
                        </button>
                    </div>
                </form>

                <!-- Social -->
				<div class="hcmv-footer-socials">
					<a href="#" class="hcmv-social-icon" aria-label="Facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="#" class="hcmv-social-icon" aria-label="TikTok">
						<i class="fab fa-tiktok"></i>
					</a>
					<a href="#" class="hcmv-social-icon" aria-label="YouTube">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
            </div>

        </div>

            <!-- Copyright -->
            <div class="hcmv-copyright">
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </div>

        </div>

    </div>
</footer>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>

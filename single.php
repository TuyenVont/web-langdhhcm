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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
    <form class="hcmv-search hcmv-search-clean" action="<?php echo esc_url($home_url); ?>" method="get" role="search">
        <span class="hcmv-search-icon" aria-hidden="true">⌕</span>

        <input
            type="search"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="<?php echo esc_attr($home_options['search_placeholder']); ?>"
            aria-label="Tìm kiếm"
        >

        <button
            type="button"
            class="hcmv-search-clear"
            aria-label="Xóa từ khóa"
            onclick="this.form.s.value=''; this.form.s.focus();"
        >
            ✕
        </button>
    </form>
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

                        <?php // TUYEN- chỉnh comments: chèn comments_template() để wpDiscuz render khối bình luận cuối bài ?>
                        <?php if (comments_open() || get_comments_number()) : ?>
                        <section class="hcmv-comments-wrap">
                            <?php comments_template(); ?>
                        </section>
                        <?php endif; ?>
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
        <li><a href="<?php echo esc_url(home_url('/index.php/category/di-chuyen-tien-ich/')); ?>">Di chuyển & tiện ích</a></li>
        <li><a href="<?php echo esc_url(home_url('/index.php/category/doi-song-sinh-vien/')); ?>">Đời sống sinh viên</a></li>
        <li><a href="<?php echo esc_url(home_url('/index.php/category/hoc-tap-phat-trien-ky-nang/')); ?>">Học tập & phát triển kỹ năng</a></li>
        <li><a href="<?php echo esc_url(home_url('/index.php/category/viec-lam-co-hoi-sinh-vien/')); ?>">Việc làm & cơ hội sinh viên</a></li>
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

                <?php
                $sub_state = isset($_GET['subscribed']) ? sanitize_text_field(wp_unslash($_GET['subscribed'])) : '';
                $options   = hcmv_child_get_options();
                if ('ok' === $sub_state) : ?>
                    <p class="hcmv-subscribe-msg hcmv-subscribe-ok"><?php echo esc_html($options['newsletter_success']); ?></p>
                <?php elseif ('invalid' === $sub_state) : ?>
                    <p class="hcmv-subscribe-msg hcmv-subscribe-err"><?php echo esc_html($options['newsletter_invalid']); ?></p>
                <?php endif; ?>
                <form class="hcmv-footer-subscribe" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="hcmv_subscribe">
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url(add_query_arg(array()))); ?>">
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

<?php wp_footer(); ?>
</body>
</html>
<?php endwhile; ?>
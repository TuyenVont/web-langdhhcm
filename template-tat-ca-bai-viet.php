<?php
/*
Template Name: Tất cả bài viết
Template Post Type: page
*/
if (!defined('ABSPATH')) {
    exit;
}

$options        = hcmv_child_get_options();
$site_name      = get_bloginfo('name') ?: 'HCM City University Village';
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url       = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'thumbnail') : '';
$home_url       = home_url('/');

// Xác định category: ưu tiên WP native query var, sau đó $_GET['cat']
if (is_category()) {
    $current_cat = get_queried_object()->slug;
} elseif (!empty($_GET['cat'])) {
    $current_cat = sanitize_title(wp_unslash($_GET['cat']));
} else {
    $current_cat = get_query_var('category_name') ?: '';
}

// Pagination: ưu tiên WP query var 'paged', sau đó $_GET['p']
$paged    = max(1, (int) get_query_var('paged') ?: (isset($_GET['p']) ? absint($_GET['p']) : 1));
$per_page = 12;

// Search query
$search_q = is_search() ? get_search_query() : '';

// Build query
$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
if ($current_cat) {
    $args['category_name'] = $current_cat;
}
if ($search_q) {
    $args['s'] = $search_q;
}

$query     = new WP_Query($args);
$total     = $query->found_posts;
$max_pages = $query->max_num_pages;

// Danh sách categories cho filter
$all_cats = get_categories(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC'));

// Tiêu đề trang
if ($search_q) {
    $page_title = 'Kết quả tìm kiếm: "' . $search_q . '"';
} elseif ($current_cat) {
    $cat_obj    = get_category_by_slug($current_cat);
    $page_title = $cat_obj ? $cat_obj->name : 'Bài viết';
} else {
    $page_title = 'Tất cả bài viết';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class('hcmv-archive-body'); ?>>
<?php wp_body_open(); ?>

<div class="hcmv-wrap">
<div class="hcmv-shell">

<!-- Header -->
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
            }
            ?>
        </nav>

        <div class="hcmv-actions">
            <form class="hcmv-search hcmv-search-clean" action="<?php echo esc_url($home_url); ?>" method="get" role="search">
                <span class="hcmv-search-icon" aria-hidden="true">⌕</span>
                <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>"
                    placeholder="<?php echo esc_attr($options['search_placeholder']); ?>" aria-label="Tìm kiếm">
                <button type="button" class="hcmv-search-clear" aria-label="Xóa từ khóa"
                    onclick="this.form.s.value='';this.form.s.focus();">✕</button>
            </form>
        </div>
    </div>
</header>

<!-- Main -->
<main class="hcmv-archive-main">
    <div class="hcmv-container">

        <!-- Page header -->
        <div class="hcmv-archive-header">
            <div>
                <h1 class="hcmv-archive-title"><?php echo esc_html($page_title); ?></h1>
                <p class="hcmv-archive-count"><?php echo esc_html($total); ?> bài viết</p>
            </div>
        </div>

        <!-- Category filter -->
        <?php if (!empty($all_cats)) : ?>
        <div class="hcmv-archive-filters" role="navigation" aria-label="Lọc theo chủ đề">
            <a class="hcmv-filter-pill <?php echo !$current_cat ? 'is-active' : ''; ?>"
               href="<?php echo esc_url(hcmv_child_posts_url()); ?>">
                Tất cả
            </a>
            <?php foreach ($all_cats as $cat) : ?>
                <a class="hcmv-filter-pill <?php echo $current_cat === $cat->slug ? 'is-active' : ''; ?>"
                   href="<?php echo esc_url(add_query_arg('cat', $cat->slug, hcmv_child_posts_url())); ?>">
                    <?php echo esc_html($cat->name); ?>
                    <span class="hcmv-filter-count"><?php echo esc_html($cat->count); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Grid bài viết -->
        <?php if ($query->have_posts()) : ?>
        <div class="hcmv-post-grid hcmv-archive-grid">
            <?php
            $i = 0;
            while ($query->have_posts()) :
                $query->the_post();
                $post_id    = get_the_ID();
                $categories = get_the_category($post_id);
                $cat_name   = !empty($categories) ? $categories[0]->name : '';
                $thumb_id   = get_post_thumbnail_id($post_id);
                $eager      = $i < 3; // 3 ảnh đầu eager
            ?>
            <a class="hcmv-post" href="<?php the_permalink(); ?>">
                <div class="hcmv-post-media">
                    <?php if ($thumb_id) : ?>
                        <?php echo wp_get_attachment_image($thumb_id, 'large', false, array(
                            'alt'          => get_the_title(),
                            'loading'      => $eager ? 'eager' : 'lazy',
                            'fetchpriority' => $eager ? 'high' : 'auto',
                        )); // phpcs:ignore ?>
                    <?php else : ?>
                        <div class="hcmv-post-no-img"></div>
                    <?php endif; ?>
                    <?php if ($cat_name) : ?>
                        <span class="hcmv-tag"><?php echo esc_html($cat_name); ?></span>
                    <?php endif; ?>
                </div>
                <div class="hcmv-post-body">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 20, '...')); ?></p>
                    <div class="hcmv-post-meta">
                        <?php echo esc_html(get_the_author()); ?> •
                        <?php echo esc_html(get_the_date('d/m/Y')); ?>
                    </div>
                </div>
            </a>
            <?php
                $i++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <!-- Pagination -->
        <?php if ($max_pages > 1) : ?>
        <nav class="hcmv-pagination" aria-label="Phân trang">
            <?php
            $base_url = $current_cat
                ? add_query_arg('cat', $current_cat, hcmv_child_posts_url())
                : hcmv_child_posts_url();

            for ($p = 1; $p <= $max_pages; $p++) :
                $url = add_query_arg('p', $p, $base_url);
            ?>
                <a class="hcmv-page-btn <?php echo $p === $paged ? 'is-active' : ''; ?>"
                   href="<?php echo esc_url($url); ?>"
                   aria-label="Trang <?php echo esc_attr($p); ?>"
                   <?php echo $p === $paged ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html($p); ?>
                </a>
            <?php endfor; ?>
        </nav>
        <?php endif; ?>

        <?php else : ?>
        <div class="hcmv-empty-note">Chưa có bài viết nào trong mục này.</div>
        <?php endif; ?>

    </div>
</main>

<!-- Footer -->
<footer class="hcmv-footer">
    <div class="hcmv-container">
        <div class="hcmv-footer-grid">

            <div class="hcmv-footer-col">
                <div class="hcmv-footer-brand"><?php echo esc_html(get_bloginfo('name')); ?></div>
                <p>Cẩm nang sống, học tập & ăn chơi dành cho sinh viên tại Làng Đại học ĐHQG-HCM.</p>
            </div>

            <div class="hcmv-footer-col">
                <h4>KHÁM PHÁ</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/category/di-chuyen-tien-ich/')); ?>">Di chuyển & tiện ích</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/doi-song-sinh-vien/')); ?>">Đời sống sinh viên</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/hoc-tap-phat-trien-ky-nang/')); ?>">Học tập & phát triển kỹ năng</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/viec-lam-co-hoi-sinh-vien/')); ?>">Việc làm & cơ hội sinh viên</a></li>
                </ul>
            </div>

            <div class="hcmv-footer-col">
                <h4>CẨM NANG</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/tan-sinh-vien')); ?>">Tân sinh viên cần biết</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-phi-sinh-hoat')); ?>">Chi phí sinh hoạt</a></li>
                    <li><a href="<?php echo esc_url(home_url('/review-quan-an')); ?>">Review quán ăn</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ky-tuc-xa')); ?>">Ký túc xá</a></li>
                </ul>
            </div>

            <div class="hcmv-footer-col">
                <h4>HỖ TRỢ</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo esc_url(home_url('/lien-he/')); ?>">Liên hệ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat/')); ?>">Chính sách bảo mật</a></li>
                    <li><a href="<?php echo esc_url(home_url('/dieu-khoan-su-dung/')); ?>">Điều khoản sử dụng</a></li>
                </ul>
            </div>

            <div class="hcmv-footer-col">
                <h4>NHẬN TIPS SINH VIÊN</h4>
                <p class="hcmv-footer-newsletter-desc">Nhận ngay các tips hữu ích mỗi tuần: ăn ngon – sống rẻ – học tốt – kiếm tiền dễ</p>
                <?php
                $sub_state   = isset($_GET['subscribed']) ? sanitize_text_field(wp_unslash($_GET['subscribed'])) : '';
                $opts        = hcmv_child_get_options();
                if ('ok' === $sub_state) : ?>
                    <p class="hcmv-subscribe-msg hcmv-subscribe-ok"><?php echo esc_html($opts['newsletter_success']); ?></p>
                <?php elseif ('invalid' === $sub_state) : ?>
                    <p class="hcmv-subscribe-msg hcmv-subscribe-err"><?php echo esc_html($opts['newsletter_invalid']); ?></p>
                <?php endif; ?>
                <form class="hcmv-footer-subscribe" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="hcmv_subscribe">
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url(add_query_arg(array()))); ?>">
                    <?php wp_nonce_field('hcmv_subscribe', 'hcmv_nonce'); ?>
                    <div class="hcmv-footer-subscribe-row">
                        <input type="email" name="subscriber_email" placeholder="Nhập email của bạn..." required>
                        <button type="submit" class="hcmv-footer-subscribe-btn">Đăng ký</button>
                    </div>
                </form>
                <div class="hcmv-footer-socials">
                    <a href="#" class="hcmv-social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hcmv-social-icon" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="hcmv-social-icon" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>
        <div class="hcmv-copyright">
            © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </div>
    </div>
</footer>

</div><!-- .hcmv-shell -->
</div><!-- .hcmv-wrap -->

<?php wp_footer(); ?>
</body>
</html>

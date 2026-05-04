<?php
if (!defined('ABSPATH')) {
    exit;
}

$options        = hcmv_child_get_options();
$site_name      = get_bloginfo('name') ?: 'HCM City University Village';
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url       = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'thumbnail') : '';
$home_url       = home_url('/');

$current_term = get_queried_object();
$current_cat  = ($current_term && !is_wp_error($current_term)) ? $current_term->slug : '';

$paged    = max(1, (int) get_query_var('paged'));
$per_page = 12;

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

$query     = new WP_Query($args);
$total     = $query->found_posts;
$max_pages = $query->max_num_pages;

$all_cats = get_categories(array(
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
));

$page_title = single_cat_title('', false);
$cat_desc   = category_description();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class('hcmv-archive-body hcmv-category-body'); ?>>
<?php wp_body_open(); ?>

<div class="hcmv-wrap">
<div class="hcmv-shell">

<header class="hcmv-topbar">
    <div class="hcmv-container hcmv-topbar-inner">
        <a class="hcmv-brand-wrap" href="<?php echo esc_url($home_url); ?>">
            <span class="hcmv-brand-logo">
				<img src="https://langdhhcm.info.vn/wp-content/uploads/2026/04/cropped-L-Photoroom.png" alt="<?php echo esc_attr($site_name); ?>">
			</span>
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
                <input
                    type="search"
                    name="s"
                    value="<?php echo esc_attr(get_search_query()); ?>"
                    placeholder="<?php echo esc_attr($options['search_placeholder']); ?>"
                    aria-label="Tìm kiếm"
                >
                <button
                    type="button"
                    class="hcmv-search-clear"
                    aria-label="Xóa từ khóa"
                    onclick="this.form.s.value='';this.form.s.focus();"
                >✕</button>
            </form>
        </div>
    </div>
</header>

<main class="hcmv-archive-main">
    <div class="hcmv-container">

        <div class="hcmv-archive-header">
            <div>
                <h1 class="hcmv-archive-title"><?php echo esc_html($page_title); ?></h1>
                <p class="hcmv-archive-count"><?php echo esc_html($total); ?> bài viết</p>

                <?php if (!empty($cat_desc)) : ?>
                    <div class="hcmv-archive-desc">
                        <?php echo wp_kses_post($cat_desc); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($all_cats)) : ?>
            <div class="hcmv-archive-filters" role="navigation" aria-label="Lọc theo chủ đề">
                <a class="hcmv-filter-pill" href="<?php echo esc_url(home_url('/tat-ca-bai-viet/')); ?>">
                    Tất cả
                </a>

                <?php foreach ($all_cats as $cat) : ?>
                    <a
                        class="hcmv-filter-pill <?php echo $current_cat === $cat->slug ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                    >
                        <?php echo esc_html($cat->name); ?>
                        <span class="hcmv-filter-count"><?php echo esc_html($cat->count); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($query->have_posts()) : ?>
            <div class="hcmv-post-grid hcmv-archive-grid">
                <?php
                $i = 0;
                while ($query->have_posts()) :
                    $query->the_post();

                    $post_id    = get_the_ID();
                    $categories = get_the_category($post_id);
                    $cat_name   = !empty($categories) ? $categories[0]->name : '';
                    $thumb_url  = hcmv_child_get_post_image($post_id, 'large');
                    $eager      = $i < 3;
                    ?>
                    <a class="hcmv-post" href="<?php the_permalink(); ?>">
                        <div class="hcmv-post-media">
                            <?php if ($thumb_url) : ?>
                                <img
                                    src="<?php echo esc_url($thumb_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                    loading="<?php echo $eager ? 'eager' : 'lazy'; ?>"
                                    fetchpriority="<?php echo $eager ? 'high' : 'auto'; ?>"
                                >
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

            <?php if ($max_pages > 1) : ?>
                <nav class="hcmv-pagination" aria-label="Phân trang">
                    <?php
                    echo paginate_links(array(
                        'total'     => $max_pages,
                        'current'   => $paged,
                        'prev_text' => '←',
                        'next_text' => '→',
                        'type'      => 'plain',
                    ));
                    ?>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            <div class="hcmv-empty-note">Chưa có bài viết nào trong chuyên mục này.</div>
        <?php endif; ?>

    </div>
</main>

<footer class="hcmv-footer">
    <div class="hcmv-container">

        <div class="hcmv-footer-grid">

            <!-- Cột 1: Brand -->
            <div class="hcmv-footer-col">
                <div class="hcmv-footer-brand">
                    <?php echo esc_html(get_bloginfo('name')); ?>
                </div>
                <p>Cẩm nang sống, học tập & ăn chơi dành cho sinh viên tại Làng Đại học ĐHQG-HCM. Khám phá mọi thứ bạn cần từ ăn uống, nhà trọ đến kinh nghiệm học tập.<br>Website chia sẻ thông tin Làng Đại học Thủ Đức dành cho sinh viên.<br>
Email: nhom3.ec204@gmail.com<br>
SĐT: 0798588053<br>
Địa chỉ: TP.HCM
                </p>
            </div>

            <!-- Cột 2: Khám phá -->
             <div class="hcmv-footer-col">
    <h4>KHÁM PHÁ</h4>
    
<ul class="hcmv-footer-menu">
    <li><a href="<?php echo esc_url(home_url('/category/di-chuyen-tien-ich-lang-dai-hoc/')); ?>">Di chuyển & tiện ích</a></li>
    <li><a href="<?php echo esc_url(home_url('/category/doi-song-sinh-vien-lang-dai-hoc/')); ?>">Đời sống sinh viên</a></li>
    <li><a href="<?php echo esc_url(home_url('/category/hoc-tap-phat-trien-ky-nang/')); ?>">Học tập & phát triển kỹ năng</a></li>
    <li><a href="<?php echo esc_url(home_url('/category/viec-lam-co-hoi-sinh-vien/')); ?>">Việc làm & cơ hội sinh viên</a></li>
</ul>

</div>

            <!-- Cột 3: Cẩm nang -->
            <div class="hcmv-footer-col">
                <h4>CẨM NANG</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/category/di-chuyen-tien-ich-lang-dai-hoc/')); ?>">Tân sinh viên cần biết</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/viec-lam-co-hoi-sinh-vien/')); ?>">Chi phí sinh hoạt</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/doi-song-sinh-vien-lang-dai-hoc/')); ?>">Review quán ăn</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/doi-song-sinh-vien-lang-dai-hoc/')); ?>">Ký túc xá</a></li>
                    <li><a href="<?php echo esc_url(home_url('/checklist-nhap-hoc-tan-sinh-vien/')); ?>">Checklist nhập học</a></li>
                </ul>
            </div>

            <!-- Cột 4: Hỗ trợ -->
             <div class="hcmv-footer-col">
                <h4>HỖ TRỢ</h4>
                <ul class="hcmv-footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo esc_url(home_url('/lien-he/')); ?>">Liên hệ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat/')); ?>">Chính sách bảo mật</a></li>
                    <li><a href="<?php echo esc_url(home_url('/dieu-khoan-su-dung/')); ?>">Điều khoản sử dụng</a></li>
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
				
				<!-- sitemap				 -->
				<div class = "footer-sitemap" style="margin-top:16px; font-size:13px; text-align:center;">
					<a href="https://langdhhcm.info.vn/sitemap_index.xml" class="hcmv-sitemap">Sitemap.</a>
					<a href="https://langdhhcm.info.vn/gioi-thieu/" class="hcmv-sitemap">Giới thiệu</a>
				</div>
				<!-- Social -->
				<div class="hcmv-footer-socials">
					<a href="https://www.facebook.com/profile.php?id=61575666167762" class="hcmv-social-icon" aria-label="Facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="#" class="hcmv-social-icon" aria-label="TikTok">
						<i class="fab fa-tiktok"></i>
					</a>
					<a href="https://www.youtube.com/@C%E1%BA%A9mnangL%C3%A0ng%C4%90%E1%BA%A1ih%E1%BB%8Dc" class="hcmv-social-icon" aria-label="YouTube">
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
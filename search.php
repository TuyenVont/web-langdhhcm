<?php
if (!defined('ABSPATH')) {
    exit;
}

$options   = hcmv_child_get_options();
$site_name = get_bloginfo('name') ?: 'HCM City University Village';
$home_url  = home_url('/');

function hcmv_search_get_first_image($post_id) {
    $content = get_post_field('post_content', $post_id);
    preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $matches);

    return !empty($matches[1]) ? $matches[1] : '';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('hcmv-search-body'); ?>>
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
                    } else {
                        echo '<ul class="hcmv-nav-menu">';
                        echo '<li><a href="' . esc_url(home_url('/category/di-chuyen-tien-ich-lang-dai-hoc/')) . '">Di chuyển & tiện ích</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/category/doi-song-sinh-vien-lang-dai-hoc/')) . '">Đời sống sinh viên</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/category/hoc-tap-phat-trien-ky-nang/')) . '">Học tập & phát triển kỹ năng</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/category/viec-lam-co-hoi-sinh-vien/')) . '">Việc làm & cơ hội sinh viên</a></li>';
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
                            placeholder="<?php echo esc_attr($options['search_placeholder'] ?? 'Nhập từ khóa...'); ?>"
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

        <main class="hcmv-main">
            <section class="hcmv-section">
                <div class="hcmv-container">

                    <div class="hcmv-section-head">
                        <div>
                            <h1>Kết quả tìm kiếm cho: <?php echo esc_html(get_search_query()); ?></h1>
                        </div>
                    </div>

                    <?php if (have_posts()) : ?>
                        <div class="hcmv-post-grid">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php
                                $first_img = hcmv_search_get_first_image(get_the_ID());
                                $cat       = get_the_category();
                                ?>

                                <a class="hcmv-post" href="<?php the_permalink(); ?>">
                                    <div class="hcmv-post-media">

                                        <?php if ($first_img) : ?>
                                            <img src="<?php echo esc_url($first_img); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php elseif (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large'); ?>
                                        <?php else : ?>
                                            <img
                                                src="https://langdhhcm.info.vn/wp-content/uploads/2026/04/dji-0120-1479195507-1-1.webp"
                                                alt="<?php the_title_attribute(); ?>"
                                            >
                                        <?php endif; ?>

                                        <?php if (!empty($cat)) : ?>
                                            <span class="hcmv-tag"><?php echo esc_html($cat[0]->name); ?></span>
                                        <?php endif; ?>

                                    </div>

                                    <div class="hcmv-post-body">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                                        <div class="hcmv-post-meta">
                                            <?php echo esc_html(get_the_author()); ?> • <?php echo esc_html(get_the_date('d/m/Y')); ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>

                        <?php the_posts_pagination(); ?>

                    <?php else : ?>
                        <p>Không tìm thấy bài viết phù hợp.</p>
                    <?php endif; ?>

                </div>
            </section>
        </main>

    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
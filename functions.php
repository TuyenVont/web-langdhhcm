<?php
if (!defined('ABSPATH')) {
    exit;
}

function hcmv_child_default_options() {
    $site_name = get_bloginfo('name') ? get_bloginfo('name') : 'HCM City University Village';

    return array(
        'search_placeholder'          => 'Tìm kiếm kinh nghiệm...',
        'header_cta_text'             => 'Bắt đầu từ đây',
        'header_cta_url'              => '#bai-viet',
        'hero_badge'                  => 'Guide 2024',
        'hero_title'                  => 'Cẩm nang Làng Đại học HCM cho sinh viên',
        'hero_description'            => 'Mọi thông tin cần thiết về ăn, ở, đi lại, học tập và trải nghiệm thực tế tại khu đô thị Đại học Quốc gia TP.HCM.',
        'hero_image_id'               => 0,
        'hero_overlay_label'          => 'Cập nhật mới nhất',
        'hero_overlay_title'          => 'Kế hoạch mở rộng tuyến Metro số 1 đến Làng Đại học',
        'quick_links'                 => array(
            array('text' => 'Ở Làng Đại học nên thuê trọ khu nào?', 'url' => '#faq'),
            array('text' => 'Top quán ăn sinh viên giá rẻ', 'url' => '#bai-viet'),
            array('text' => 'Hướng dẫn di chuyển', 'url' => '#kham-pha'),
        ),
        'latest_posts_title'          => 'Bài viết mới nhất',
        'latest_posts_desc'           => 'Cập nhật tin tức và review hằng ngày từ cộng đồng sinh viên.',
        'latest_posts_button_text'    => 'Xem tất cả bài viết',
        'posts_count'                 => '4',
        'posts_category'              => '',
        'audiences'                   => array(
            array('icon' => '🎓', 'title' => 'Dành cho tân sinh viên', 'text' => 'Mới đặt chân đến Làng? Đây là bộ hướng dẫn sống còn để bạn không bị bỡ ngỡ.', 'label' => 'Khám phá', 'url' => '#kham-pha', 'color' => '#2563eb'),
            array('icon' => '🏠', 'title' => 'Người tìm trọ', 'text' => 'Đang loay hoay tìm nơi ở ưng ý? Chúng mình có danh sách và review trọ tin cậy.', 'label' => 'Xem ngay', 'url' => '#bai-viet', 'color' => '#2f7d32'),
            array('icon' => '🐷', 'title' => 'Người muốn tiết kiệm', 'text' => 'Làm sao để sống tốt với 3 triệu/tháng? Bí kíp chi tiêu thông minh là đây.', 'label' => 'Học cách chi tiêu', 'url' => '#faq', 'color' => '#8a6510'),
            array('icon' => '📘', 'title' => 'Cần chỗ học yên tĩnh', 'text' => 'Tổng hợp những góc học tập chill và yên tĩnh nhất khu đô thị và lân cận.', 'label' => 'Tìm chỗ học', 'url' => '#faq', 'color' => '#4f46e5'),
        ),
        'explore_title'               => 'Khám phá theo khu vực',
        'explore_desc'                => 'Làng Đại học rất rộng. Hãy chia nội dung theo khu nhà trọ, trạm xe buýt, chợ đêm, khu học tập hoặc tiện ích xung quanh để người xem tìm nhanh hơn.',
        'explore_button_text'         => 'Xem bản đồ thực tế',
        'explore_button_url'          => 'https://maps.google.com',
        'explore_pills'               => array(
            array('text' => 'Khu gần KTX B', 'url' => '#faq'),
            array('text' => 'Khu gần bến xe buýt', 'url' => '#faq'),
            array('text' => 'Khu trung tâm Làng', 'url' => '#faq'),
            array('text' => 'Khu gần Chợ Đêm', 'url' => '#faq'),
        ),
        'faq_title'                   => 'Câu hỏi thường gặp',
        'faqs'                        => array(
            array('question' => 'Ở Làng Đại học nên thuê trọ khu nào an ninh nhất?', 'answer' => 'Ưu tiên khu gần cổng trường, có camera, đường sáng đèn và có review thực tế từ sinh viên.'),
            array('question' => 'Chi phí sống trung bình một tháng ở đây là bao nhiêu?', 'answer' => 'Bạn có thể chia theo 4 nhóm: tiền trọ, ăn uống, đi lại và phát sinh.'),
            array('question' => 'Mua đồ dùng học tập và nhu yếu phẩm ở đâu rẻ nhất?', 'answer' => 'Hãy gom thành 1 chuyên mục tiết kiệm gồm chợ dân sinh, cửa hàng tiện lợi, nhà sách và các điểm photo quanh khu vực.'),
        ),
        'newsletter_title'            => 'Luôn cập nhật thông tin mới nhất?',
        'newsletter_desc'             => 'Đăng ký nhận bài review và tin tức về Làng Đại học qua email hằng tuần.',
        'newsletter_placeholder'      => 'Email của bạn...',
        'newsletter_button_text'      => 'Đăng ký ngay',
        'newsletter_success'          => '✅ Đăng ký thành công.',
        'newsletter_invalid'          => '⚠️ Email chưa hợp lệ, bạn thử lại nhé.',
        'footer_brand'                => $site_name,
        'footer_desc'                 => 'Cổng thông tin và cẩm nang sống còn dành cho cộng đồng sinh viên quanh khu đô thị ĐHQG-HCM.',
        'footer_apps_title'           => 'Tải ứng dụng',
        'footer_apps_desc'            => 'Sắp ra mắt trên iOS và Android để trải nghiệm tìm kiếm nhanh hơn.',
        'app_store_text'              => 'App Store',
        'app_store_url'               => '#',
        'google_play_text'            => 'Google Play',
        'google_play_url'             => '#',
        'footer_copyright'            => '© %year% Ho Chi Minh City University Village Handbook. Curated for VNU-HCM students.',
    );
}

function hcmv_child_get_options() {
    $defaults = hcmv_child_default_options();
    $saved    = get_option('hcmv_homepage_options', array());

    if (!is_array($saved)) {
        $saved = array();
    }

    return wp_parse_args($saved, $defaults);
}

function hcmv_child_get_option($key, $fallback = '') {
    $options = hcmv_child_get_options();
    return isset($options[$key]) ? $options[$key] : $fallback;
}

function hcmv_child_get_image_url($attachment_id, $fallback = '') {
    $attachment_id = absint($attachment_id);
    if ($attachment_id) {
        $image = wp_get_attachment_image_url($attachment_id, 'full');
        if ($image) {
            return $image;
        }
    }

    return $fallback;
}

function hcmv_child_svg_placeholder($title = 'University Village', $bg1 = '#dbeafe', $bg2 = '#f8fafc', $accent = '#2563eb') {
    $svg = '
    <svg xmlns="http://www.w3.org/2000/svg" width="1200" height="800" viewBox="0 0 1200 800">
      <defs>
        <linearGradient id="bg" x1="0" x2="1" y1="0" y2="1">
          <stop offset="0%" stop-color="' . esc_attr($bg1) . '"/>
          <stop offset="100%" stop-color="' . esc_attr($bg2) . '"/>
        </linearGradient>
        <linearGradient id="glass" x1="0" x2="1" y1="0" y2="1">
          <stop offset="0%" stop-color="#ffffff" stop-opacity="0.82"/>
          <stop offset="100%" stop-color="#ffffff" stop-opacity="0.35"/>
        </linearGradient>
      </defs>
      <rect fill="url(#bg)" width="1200" height="800" rx="36"/>
      <circle cx="1040" cy="120" r="120" fill="' . esc_attr($accent) . '" opacity="0.12"/>
      <circle cx="140" cy="620" r="160" fill="' . esc_attr($accent) . '" opacity="0.08"/>
      <rect x="115" y="135" width="970" height="530" rx="28" fill="#ffffff" opacity="0.72"/>
      <rect x="185" y="225" width="830" height="320" rx="20" fill="#0f172a" opacity="0.06"/>
      <rect x="300" y="185" width="600" height="390" rx="18" fill="#ffffff" opacity="0.75"/>
      <rect x="330" y="215" width="540" height="330" rx="14" fill="#f8fafc"/>
      <rect x="420" y="260" width="360" height="200" rx="14" fill="#111827" opacity="0.10"/>
      <rect x="500" y="310" width="200" height="160" rx="8" fill="#ffffff" opacity="0.95"/>
      <rect x="545" y="260" width="110" height="38" rx="8" fill="' . esc_attr($accent) . '" opacity="0.2"/>
      <rect x="185" y="560" width="830" height="66" rx="18" fill="url(#glass)"/>
      <text x="600" y="602" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="42" font-weight="700" fill="#0f172a">' . esc_html($title) . '</text>
      <text x="600" y="642" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="20" fill="#334155">Landing page placeholder – đổi bằng ảnh thật trong admin</text>
    </svg>';

    return 'data:image/svg+xml;base64,' . base64_encode($svg);
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('custom-logo');

    register_nav_menus(array(
        'hcmv_primary'  => 'HCMV Primary Menu',
        'hcmv_footer_1' => 'HCMV Footer Menu 1',
        'hcmv_footer_2' => 'HCMV Footer Menu 2',
    ));
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('blocksy-parent-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme(get_template())->get('Version'));
    wp_enqueue_style('hcmv-landing-child-style', get_stylesheet_uri(), array('blocksy-parent-style'), wp_get_theme()->get('Version'));
}, 20);

add_action('admin_enqueue_scripts', function ($hook) {
    if ('appearance_page_hcmv-homepage-settings' !== $hook) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script(
        'hcmv-admin-media',
        get_stylesheet_directory_uri() . '/assets/admin.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
});

add_action('admin_menu', function () {
    add_theme_page(
        'HCMV Homepage',
        'HCMV Homepage',
        'manage_options',
        'hcmv-homepage-settings',
        'hcmv_child_render_settings_page'
    );
});

add_action('admin_init', function () {
    register_setting('hcmv_homepage_group', 'hcmv_homepage_options', 'hcmv_child_sanitize_options');
});

function hcmv_child_sanitize_text($value) {
    return sanitize_text_field((string) $value);
}

function hcmv_child_sanitize_textarea($value) {
    return sanitize_textarea_field((string) $value);
}

function hcmv_child_sanitize_url($value) {
    return esc_url_raw((string) $value);
}

function hcmv_child_sanitize_options($input) {
    $defaults = hcmv_child_default_options();
    $output   = $defaults;

    $output['search_placeholder']       = hcmv_child_sanitize_text($input['search_placeholder'] ?? $defaults['search_placeholder']);
    $output['header_cta_text']          = hcmv_child_sanitize_text($input['header_cta_text'] ?? $defaults['header_cta_text']);
    $output['header_cta_url']           = hcmv_child_sanitize_url($input['header_cta_url'] ?? $defaults['header_cta_url']);
    $output['hero_badge']               = hcmv_child_sanitize_text($input['hero_badge'] ?? $defaults['hero_badge']);
    $output['hero_title']               = hcmv_child_sanitize_textarea($input['hero_title'] ?? $defaults['hero_title']);
    $output['hero_description']         = hcmv_child_sanitize_textarea($input['hero_description'] ?? $defaults['hero_description']);
    $output['hero_image_id']            = absint($input['hero_image_id'] ?? 0);
    $output['hero_overlay_label']       = hcmv_child_sanitize_text($input['hero_overlay_label'] ?? $defaults['hero_overlay_label']);
    $output['hero_overlay_title']       = hcmv_child_sanitize_textarea($input['hero_overlay_title'] ?? $defaults['hero_overlay_title']);
    $output['latest_posts_title']       = hcmv_child_sanitize_text($input['latest_posts_title'] ?? $defaults['latest_posts_title']);
    $output['latest_posts_desc']        = hcmv_child_sanitize_textarea($input['latest_posts_desc'] ?? $defaults['latest_posts_desc']);
    $output['latest_posts_button_text'] = hcmv_child_sanitize_text($input['latest_posts_button_text'] ?? $defaults['latest_posts_button_text']);
    $output['posts_count']              = (string) max(1, min(8, absint($input['posts_count'] ?? $defaults['posts_count'])));
    $output['posts_category']           = sanitize_title($input['posts_category'] ?? $defaults['posts_category']);
    $output['explore_title']            = hcmv_child_sanitize_text($input['explore_title'] ?? $defaults['explore_title']);
    $output['explore_desc']             = hcmv_child_sanitize_textarea($input['explore_desc'] ?? $defaults['explore_desc']);
    $output['explore_button_text']      = hcmv_child_sanitize_text($input['explore_button_text'] ?? $defaults['explore_button_text']);
    $output['explore_button_url']       = hcmv_child_sanitize_url($input['explore_button_url'] ?? $defaults['explore_button_url']);
    $output['faq_title']                = hcmv_child_sanitize_text($input['faq_title'] ?? $defaults['faq_title']);
    $output['newsletter_title']         = hcmv_child_sanitize_text($input['newsletter_title'] ?? $defaults['newsletter_title']);
    $output['newsletter_desc']          = hcmv_child_sanitize_textarea($input['newsletter_desc'] ?? $defaults['newsletter_desc']);
    $output['newsletter_placeholder']   = hcmv_child_sanitize_text($input['newsletter_placeholder'] ?? $defaults['newsletter_placeholder']);
    $output['newsletter_button_text']   = hcmv_child_sanitize_text($input['newsletter_button_text'] ?? $defaults['newsletter_button_text']);
    $output['newsletter_success']       = hcmv_child_sanitize_text($input['newsletter_success'] ?? $defaults['newsletter_success']);
    $output['newsletter_invalid']       = hcmv_child_sanitize_text($input['newsletter_invalid'] ?? $defaults['newsletter_invalid']);
    $output['footer_brand']             = hcmv_child_sanitize_text($input['footer_brand'] ?? $defaults['footer_brand']);
    $output['footer_desc']              = hcmv_child_sanitize_textarea($input['footer_desc'] ?? $defaults['footer_desc']);
    $output['footer_apps_title']        = hcmv_child_sanitize_text($input['footer_apps_title'] ?? $defaults['footer_apps_title']);
    $output['footer_apps_desc']         = hcmv_child_sanitize_textarea($input['footer_apps_desc'] ?? $defaults['footer_apps_desc']);
    $output['app_store_text']           = hcmv_child_sanitize_text($input['app_store_text'] ?? $defaults['app_store_text']);
    $output['app_store_url']            = hcmv_child_sanitize_url($input['app_store_url'] ?? $defaults['app_store_url']);
    $output['google_play_text']         = hcmv_child_sanitize_text($input['google_play_text'] ?? $defaults['google_play_text']);
    $output['google_play_url']          = hcmv_child_sanitize_url($input['google_play_url'] ?? $defaults['google_play_url']);
    $output['footer_copyright']         = hcmv_child_sanitize_textarea($input['footer_copyright'] ?? $defaults['footer_copyright']);

    $output['quick_links'] = array();
    for ($i = 0; $i < 3; $i++) {
        $output['quick_links'][$i] = array(
            'text' => hcmv_child_sanitize_text($input['quick_links'][$i]['text'] ?? $defaults['quick_links'][$i]['text']),
            'url'  => hcmv_child_sanitize_url($input['quick_links'][$i]['url'] ?? $defaults['quick_links'][$i]['url']),
        );
    }

    $output['audiences'] = array();
    for ($i = 0; $i < 4; $i++) {
        $fallback = $defaults['audiences'][$i];
        $color    = sanitize_hex_color($input['audiences'][$i]['color'] ?? $fallback['color']);
        $output['audiences'][$i] = array(
            'icon'  => hcmv_child_sanitize_text($input['audiences'][$i]['icon'] ?? $fallback['icon']),
            'title' => hcmv_child_sanitize_text($input['audiences'][$i]['title'] ?? $fallback['title']),
            'text'  => hcmv_child_sanitize_textarea($input['audiences'][$i]['text'] ?? $fallback['text']),
            'label' => hcmv_child_sanitize_text($input['audiences'][$i]['label'] ?? $fallback['label']),
            'url'   => hcmv_child_sanitize_url($input['audiences'][$i]['url'] ?? $fallback['url']),
            'color' => $color ? $color : $fallback['color'],
        );
    }

    $output['explore_pills'] = array();
    for ($i = 0; $i < 4; $i++) {
        $fallback = $defaults['explore_pills'][$i];
        $output['explore_pills'][$i] = array(
            'text' => hcmv_child_sanitize_text($input['explore_pills'][$i]['text'] ?? $fallback['text']),
            'url'  => hcmv_child_sanitize_url($input['explore_pills'][$i]['url'] ?? $fallback['url']),
        );
    }

    $output['faqs'] = array();
    for ($i = 0; $i < 3; $i++) {
        $fallback = $defaults['faqs'][$i];
        $output['faqs'][$i] = array(
            'question' => hcmv_child_sanitize_text($input['faqs'][$i]['question'] ?? $fallback['question']),
            'answer'   => hcmv_child_sanitize_textarea($input['faqs'][$i]['answer'] ?? $fallback['answer']),
        );
    }

    add_settings_error('hcmv_homepage_options', 'hcmv_homepage_saved', 'Đã lưu homepage.', 'updated');

    return $output;
}

function hcmv_child_admin_field($label, $name, $value, $type = 'text', $args = array()) {
    $placeholder = isset($args['placeholder']) ? $args['placeholder'] : '';
    $description = isset($args['description']) ? $args['description'] : '';

    echo '<div class="hcmv-admin-field">';
    echo '<label><strong>' . esc_html($label) . '</strong></label>';

    if ('textarea' === $type) {
        echo '<textarea class="large-text" rows="4" name="' . esc_attr($name) . '" placeholder="' . esc_attr($placeholder) . '">' . esc_textarea($value) . '</textarea>';
    } elseif ('color' === $type) {
        echo '<input class="regular-text" type="text" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '" placeholder="#2563eb">';
    } else {
        echo '<input class="regular-text" type="' . esc_attr($type) . '" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '" placeholder="' . esc_attr($placeholder) . '">';
    }

    if ($description) {
        echo '<p class="description">' . esc_html($description) . '</p>';
    }

    echo '</div>';
}

function hcmv_child_admin_image_field($label, $name, $attachment_id) {
    $image_url = $attachment_id ? wp_get_attachment_image_url($attachment_id, 'medium') : '';

    echo '<div class="hcmv-admin-field">';
    echo '<label><strong>' . esc_html($label) . '</strong></label>';
    echo '<input type="hidden" class="hcmv-image-id" name="' . esc_attr($name) . '" value="' . esc_attr($attachment_id) . '">';
    echo '<div class="hcmv-media-box">';
    echo '<div class="hcmv-media-preview">';
    if ($image_url) {
        echo '<img src="' . esc_url($image_url) . '" alt="">';
    } else {
        echo '<span>Chưa chọn ảnh</span>';
    }
    echo '</div>';
    echo '<div class="hcmv-media-actions">';
    echo '<button type="button" class="button button-secondary hcmv-media-upload">Chọn ảnh</button> ';
    echo '<button type="button" class="button hcmv-media-remove">Xóa ảnh</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function hcmv_child_render_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $options     = hcmv_child_get_options();
    $subscribers = get_option('hcmv_child_subscribers', array());
    ?>
    <div class="wrap hcmv-admin-wrap">
        <h1>HCMV Homepage</h1>
        <p>Toàn bộ nội dung của homepage có thể sửa tại đây. Menu header/footer chỉnh ở <strong>Appearance &gt; Menus</strong>.</p>
        <?php settings_errors('hcmv_homepage_options'); ?>

        <style>
            .hcmv-admin-wrap .hcmv-admin-grid {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px;max-width:1280px;}
            .hcmv-admin-wrap .hcmv-admin-card {background:#fff;border:1px solid #dcdcde;border-radius:16px;padding:20px;box-shadow:0 4px 18px rgba(0,0,0,.04);margin-bottom:20px;}
            .hcmv-admin-wrap .hcmv-admin-card h2 {margin-top:0;font-size:20px;}
            .hcmv-admin-wrap .hcmv-admin-field {margin-bottom:16px;}
            .hcmv-admin-wrap .hcmv-admin-field label {display:block;margin-bottom:6px;}
            .hcmv-admin-wrap .hcmv-admin-field input.regular-text,
            .hcmv-admin-wrap .hcmv-admin-field textarea,
            .hcmv-admin-wrap .hcmv-admin-field .large-text {width:100%;max-width:none;}
            .hcmv-admin-wrap .hcmv-repeat-card {border:1px solid #e5e7eb;border-radius:12px;padding:14px;margin-bottom:14px;background:#fafafa;}
            .hcmv-admin-wrap .hcmv-repeat-card h3 {margin-top:0;margin-bottom:14px;}
            .hcmv-admin-wrap .hcmv-media-box {display:flex;gap:16px;align-items:flex-start;flex-wrap:wrap;}
            .hcmv-admin-wrap .hcmv-media-preview {width:220px;height:140px;border:1px dashed #c9ccd1;border-radius:12px;background:#f8fafc;display:flex;align-items:center;justify-content:center;overflow:hidden;color:#64748b;}
            .hcmv-admin-wrap .hcmv-media-preview img {width:100%;height:100%;object-fit:cover;display:block;}
            .hcmv-admin-wrap .hcmv-media-actions {display:flex;gap:10px;flex-wrap:wrap;}
            .hcmv-admin-wrap .hcmv-subscriber-box {max-height:220px;overflow:auto;background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:12px;}
            .hcmv-admin-wrap .hcmv-tip {background:#eef6ff;border-left:4px solid #2563eb;padding:12px 14px;border-radius:10px;margin:14px 0 24px;}
            @media (max-width: 960px){.hcmv-admin-wrap .hcmv-admin-grid{grid-template-columns:1fr;}}
        </style>

        <div class="hcmv-tip">
            Muốn đổi logo/tên site: <strong>Settings &gt; General</strong> và <strong>Appearance &gt; Customize</strong>. Muốn đổi bài viết: <strong>Posts</strong>. Muốn đổi menu: <strong>Appearance &gt; Menus</strong>.
        </div>

        <form method="post" action="options.php">
            <?php settings_fields('hcmv_homepage_group'); ?>

            <div class="hcmv-admin-grid">
                <div>
                    <div class="hcmv-admin-card">
                        <h2>Header</h2>
                        <?php
                        hcmv_child_admin_field('Placeholder ô tìm kiếm', 'hcmv_homepage_options[search_placeholder]', $options['search_placeholder']);
                        hcmv_child_admin_field('Nút CTA header - Text', 'hcmv_homepage_options[header_cta_text]', $options['header_cta_text']);
                        hcmv_child_admin_field('Nút CTA header - Link', 'hcmv_homepage_options[header_cta_url]', $options['header_cta_url'], 'url');
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Hero</h2>
                        <?php
                        hcmv_child_admin_field('Badge', 'hcmv_homepage_options[hero_badge]', $options['hero_badge']);
                        hcmv_child_admin_field('Tiêu đề lớn', 'hcmv_homepage_options[hero_title]', $options['hero_title'], 'textarea');
                        hcmv_child_admin_field('Mô tả', 'hcmv_homepage_options[hero_description]', $options['hero_description'], 'textarea');
                        hcmv_child_admin_image_field('Ảnh hero bên phải', 'hcmv_homepage_options[hero_image_id]', $options['hero_image_id']);
                        hcmv_child_admin_field('Label overlay', 'hcmv_homepage_options[hero_overlay_label]', $options['hero_overlay_label']);
                        hcmv_child_admin_field('Tiêu đề overlay', 'hcmv_homepage_options[hero_overlay_title]', $options['hero_overlay_title'], 'textarea');
                        ?>
                        <hr>
                        <h3>3 link nhanh</h3>
                        <?php for ($i = 0; $i < 3; $i++) : ?>
                            <div class="hcmv-repeat-card">
                                <h3>Link nhanh <?php echo esc_html($i + 1); ?></h3>
                                <?php
                                hcmv_child_admin_field('Text', 'hcmv_homepage_options[quick_links][' . $i . '][text]', $options['quick_links'][$i]['text']);
                                hcmv_child_admin_field('URL', 'hcmv_homepage_options[quick_links][' . $i . '][url]', $options['quick_links'][$i]['url'], 'url');
                                ?>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Bài viết mới nhất</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề section', 'hcmv_homepage_options[latest_posts_title]', $options['latest_posts_title']);
                        hcmv_child_admin_field('Mô tả section', 'hcmv_homepage_options[latest_posts_desc]', $options['latest_posts_desc'], 'textarea');
                        hcmv_child_admin_field('Text nút', 'hcmv_homepage_options[latest_posts_button_text]', $options['latest_posts_button_text']);
                        hcmv_child_admin_field('Số bài hiển thị (1-8)', 'hcmv_homepage_options[posts_count]', $options['posts_count'], 'number');
                        hcmv_child_admin_field('Slug category cần lọc (để trống nếu lấy tất cả)', 'hcmv_homepage_options[posts_category]', $options['posts_category']);
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>4 card nhu cầu</h2>
                        <?php for ($i = 0; $i < 4; $i++) : ?>
                            <div class="hcmv-repeat-card">
                                <h3>Card <?php echo esc_html($i + 1); ?></h3>
                                <?php
                                hcmv_child_admin_field('Emoji/Icon', 'hcmv_homepage_options[audiences][' . $i . '][icon]', $options['audiences'][$i]['icon']);
                                hcmv_child_admin_field('Tiêu đề', 'hcmv_homepage_options[audiences][' . $i . '][title]', $options['audiences'][$i]['title']);
                                hcmv_child_admin_field('Mô tả', 'hcmv_homepage_options[audiences][' . $i . '][text]', $options['audiences'][$i]['text'], 'textarea');
                                hcmv_child_admin_field('Text nút', 'hcmv_homepage_options[audiences][' . $i . '][label]', $options['audiences'][$i]['label']);
                                hcmv_child_admin_field('Link nút', 'hcmv_homepage_options[audiences][' . $i . '][url]', $options['audiences'][$i]['url'], 'url');
                                hcmv_child_admin_field('Màu viền đáy', 'hcmv_homepage_options[audiences][' . $i . '][color]', $options['audiences'][$i]['color'], 'color');
                                ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div>
                    <div class="hcmv-admin-card">
                        <h2>Khám phá theo khu vực</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề section', 'hcmv_homepage_options[explore_title]', $options['explore_title']);
                        hcmv_child_admin_field('Mô tả section', 'hcmv_homepage_options[explore_desc]', $options['explore_desc'], 'textarea');
                        hcmv_child_admin_field('Text nút bản đồ', 'hcmv_homepage_options[explore_button_text]', $options['explore_button_text']);
                        hcmv_child_admin_field('Link bản đồ', 'hcmv_homepage_options[explore_button_url]', $options['explore_button_url'], 'url');
                        ?>
                        <hr>
                        <h3>4 pill khu vực</h3>
                        <?php for ($i = 0; $i < 4; $i++) : ?>
                            <div class="hcmv-repeat-card">
                                <h3>Pill <?php echo esc_html($i + 1); ?></h3>
                                <?php
                                hcmv_child_admin_field('Text', 'hcmv_homepage_options[explore_pills][' . $i . '][text]', $options['explore_pills'][$i]['text']);
                                hcmv_child_admin_field('URL', 'hcmv_homepage_options[explore_pills][' . $i . '][url]', $options['explore_pills'][$i]['url'], 'url');
                                ?>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>FAQ</h2>
                        <?php hcmv_child_admin_field('Tiêu đề FAQ', 'hcmv_homepage_options[faq_title]', $options['faq_title']); ?>
                        <?php for ($i = 0; $i < 3; $i++) : ?>
                            <div class="hcmv-repeat-card">
                                <h3>Câu hỏi <?php echo esc_html($i + 1); ?></h3>
                                <?php
                                hcmv_child_admin_field('Question', 'hcmv_homepage_options[faqs][' . $i . '][question]', $options['faqs'][$i]['question']);
                                hcmv_child_admin_field('Answer', 'hcmv_homepage_options[faqs][' . $i . '][answer]', $options['faqs'][$i]['answer'], 'textarea');
                                ?>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Newsletter</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề', 'hcmv_homepage_options[newsletter_title]', $options['newsletter_title']);
                        hcmv_child_admin_field('Mô tả', 'hcmv_homepage_options[newsletter_desc]', $options['newsletter_desc'], 'textarea');
                        hcmv_child_admin_field('Placeholder input', 'hcmv_homepage_options[newsletter_placeholder]', $options['newsletter_placeholder']);
                        hcmv_child_admin_field('Text nút', 'hcmv_homepage_options[newsletter_button_text]', $options['newsletter_button_text']);
                        hcmv_child_admin_field('Thông báo thành công', 'hcmv_homepage_options[newsletter_success]', $options['newsletter_success']);
                        hcmv_child_admin_field('Thông báo lỗi', 'hcmv_homepage_options[newsletter_invalid]', $options['newsletter_invalid']);
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Footer</h2>
                        <?php
                        hcmv_child_admin_field('Tên brand footer', 'hcmv_homepage_options[footer_brand]', $options['footer_brand']);
                        hcmv_child_admin_field('Mô tả footer', 'hcmv_homepage_options[footer_desc]', $options['footer_desc'], 'textarea');
                        hcmv_child_admin_field('Tiêu đề app', 'hcmv_homepage_options[footer_apps_title]', $options['footer_apps_title']);
                        hcmv_child_admin_field('Mô tả app', 'hcmv_homepage_options[footer_apps_desc]', $options['footer_apps_desc'], 'textarea');
                        hcmv_child_admin_field('Text App Store', 'hcmv_homepage_options[app_store_text]', $options['app_store_text']);
                        hcmv_child_admin_field('Link App Store', 'hcmv_homepage_options[app_store_url]', $options['app_store_url'], 'url');
                        hcmv_child_admin_field('Text Google Play', 'hcmv_homepage_options[google_play_text]', $options['google_play_text']);
                        hcmv_child_admin_field('Link Google Play', 'hcmv_homepage_options[google_play_url]', $options['google_play_url'], 'url');
                        hcmv_child_admin_field('Copyright (dùng %year% để tự chèn năm hiện tại)', 'hcmv_homepage_options[footer_copyright]', $options['footer_copyright'], 'textarea');
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Email đã đăng ký</h2>
                        <div class="hcmv-subscriber-box">
                            <?php if (!empty($subscribers) && is_array($subscribers)) : ?>
                                <ol>
                                    <?php foreach ($subscribers as $email) : ?>
                                        <li><?php echo esc_html($email); ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            <?php else : ?>
                                <p>Chưa có email nào.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php submit_button('Lưu homepage'); ?>
        </form>
    </div>
    <?php
}

add_action('admin_post_nopriv_hcmv_subscribe', 'hcmv_child_handle_subscribe');
add_action('admin_post_hcmv_subscribe', 'hcmv_child_handle_subscribe');

function hcmv_child_handle_subscribe() {
    if (!isset($_POST['hcmv_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hcmv_nonce'])), 'hcmv_subscribe')) {
        wp_die('Yêu cầu không hợp lệ.');
    }

    $email    = isset($_POST['subscriber_email']) ? sanitize_email(wp_unslash($_POST['subscriber_email'])) : '';
    $redirect = isset($_POST['redirect_to']) ? esc_url_raw(wp_unslash($_POST['redirect_to'])) : home_url('/');

    if (!$email || !is_email($email)) {
        wp_safe_redirect(add_query_arg('subscribed', 'invalid', $redirect));
        exit;
    }

    $subscribers = get_option('hcmv_child_subscribers', array());

    if (!in_array($email, $subscribers, true)) {
        $subscribers[] = $email;
        update_option('hcmv_child_subscribers', $subscribers, false);
    }

    wp_safe_redirect(add_query_arg('subscribed', 'ok', $redirect));
    exit;
}

function hcmv_child_posts_url() {
    $page_for_posts = (int) get_option('page_for_posts');
    if ($page_for_posts) {
        return get_permalink($page_for_posts);
    }

    return home_url('/blog/');
}

function hcmv_child_get_posts_data() {
    $options = hcmv_child_get_options();
    $count   = max(1, min(8, absint($options['posts_count'])));
    $items   = array();
    $args    = array(
        'post_type'           => 'post',
        'posts_per_page'      => $count,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
    );

    if (!empty($options['posts_category'])) {
        $args['category_name'] = $options['posts_category'];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            if (!$thumb) {
                $thumb = hcmv_child_svg_placeholder(get_the_title(), '#dbeafe', '#eff6ff', '#2563eb');
            }

            $terms = get_the_category();
            $tag   = !empty($terms) ? $terms[0]->name : 'Tin mới';

            $items[] = array(
                'title'   => get_the_title(),
                'url'     => get_permalink(),
                'excerpt' => wp_trim_words(get_the_excerpt() ? get_the_excerpt() : wp_strip_all_tags(get_the_content()), 18, '...'),
                'image'   => $thumb,
                'meta'    => get_the_author() . ' • ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' trước',
                'tag'     => $tag,
            );
        }
        wp_reset_postdata();
    }

    if (empty($items)) {
        $items = array(
            array(
                'title'   => 'Review khu nhà trọ giá rẻ sau lưng Chợ Đêm Làng Đại học',
                'url'     => '#',
                'excerpt' => 'Tổng hợp khu trọ dễ thuê, gần chợ đêm và phù hợp ngân sách sinh viên.',
                'image'   => hcmv_child_svg_placeholder('Nhà trọ', '#dbeafe', '#f8fafc', '#2563eb'),
                'meta'    => 'Admin • 2 giờ trước',
                'tag'     => 'Nhà trọ',
            ),
            array(
                'title'   => 'Lịch thi và những điều cần lưu ý cho kỳ thi cuối kỳ sắp tới',
                'url'     => '#',
                'excerpt' => 'Checklist nhanh để không quên giấy tờ, phòng thi và thời gian di chuyển.',
                'image'   => hcmv_child_svg_placeholder('Học tập', '#dcfce7', '#f0fdf4', '#16a34a'),
                'meta'    => 'NVH News • 5 giờ trước',
                'tag'     => 'Học tập',
            ),
            array(
                'title'   => 'Khám phá thiên đường lẩu 4 ngăn mới mở ngay trung tâm Làng',
                'url'     => '#',
                'excerpt' => 'Địa chỉ ăn uống mới nổi, phù hợp nhóm bạn đông người và giá vẫn ổn.',
                'image'   => hcmv_child_svg_placeholder('Ăn uống', '#fef3c7', '#fffbeb', '#d97706'),
                'meta'    => 'Foodie • 1 ngày trước',
                'tag'     => 'Ăn uống',
            ),
            array(
                'title'   => 'Tân sinh viên cần chuẩn bị gì cho tuần sinh hoạt công dân?',
                'url'     => '#',
                'excerpt' => 'Danh sách hồ sơ, app cần tải và việc nên làm ngay trong tuần đầu tiên.',
                'image'   => hcmv_child_svg_placeholder('Kinh nghiệm', '#dbeafe', '#f8fafc', '#2563eb'),
                'meta'    => 'Mentor • 1 ngày trước',
                'tag'     => 'Kinh nghiệm',
            ),
        );
    }

    return $items;
}

function hcmv_child_post_default_options() {
    return array(
        'sidebar_recent_title'      => 'Xem nhiều nhất',
        'sidebar_recent_count'      => '3',
        'sidebar_map_title'         => 'Bản đồ Làng Đại học',
        'sidebar_map_desc'          => 'Tích hợp dữ liệu xe buýt và điểm dừng nổi khu.',
        'sidebar_map_button_text'   => 'Xem chi tiết',
        'sidebar_map_button_url'    => 'https://maps.google.com',
        'sidebar_map_image_id'      => 0,
        'sidebar_help_title'        => 'Cần giúp đỡ?',
        'sidebar_help_desc'         => 'Đội ngũ cố vấn sinh viên luôn sẵn sàng hỗ trợ bạn giải đáp thắc mắc về chỗ ở.',
        'sidebar_help_button_text'  => 'Liên hệ cố vấn ngay',
        'sidebar_help_button_url'   => home_url('/lien-he/'),
        'share_label'               => 'Chia sẻ bài viết:',
        'toc_title'                 => 'Mục lục bài viết',
        'breadcrumb_label'          => 'Cẩm nang',
    );
}

function hcmv_child_get_post_options() {
    $defaults = hcmv_child_post_default_options();
    $saved    = get_option('hcmv_post_options', array());

    if (!is_array($saved)) {
        $saved = array();
    }

    return wp_parse_args($saved, $defaults);
}

function hcmv_child_sanitize_post_options($input) {
    $defaults = hcmv_child_post_default_options();
    $output   = $defaults;

    $output['sidebar_recent_title']     = hcmv_child_sanitize_text($input['sidebar_recent_title'] ?? $defaults['sidebar_recent_title']);
    $output['sidebar_recent_count']     = (string) max(1, min(6, absint($input['sidebar_recent_count'] ?? $defaults['sidebar_recent_count'])));
    $output['sidebar_map_title']        = hcmv_child_sanitize_text($input['sidebar_map_title'] ?? $defaults['sidebar_map_title']);
    $output['sidebar_map_desc']         = hcmv_child_sanitize_textarea($input['sidebar_map_desc'] ?? $defaults['sidebar_map_desc']);
    $output['sidebar_map_button_text']  = hcmv_child_sanitize_text($input['sidebar_map_button_text'] ?? $defaults['sidebar_map_button_text']);
    $output['sidebar_map_button_url']   = hcmv_child_sanitize_url($input['sidebar_map_button_url'] ?? $defaults['sidebar_map_button_url']);
    $output['sidebar_map_image_id']     = absint($input['sidebar_map_image_id'] ?? 0);
    $output['sidebar_help_title']       = hcmv_child_sanitize_text($input['sidebar_help_title'] ?? $defaults['sidebar_help_title']);
    $output['sidebar_help_desc']        = hcmv_child_sanitize_textarea($input['sidebar_help_desc'] ?? $defaults['sidebar_help_desc']);
    $output['sidebar_help_button_text'] = hcmv_child_sanitize_text($input['sidebar_help_button_text'] ?? $defaults['sidebar_help_button_text']);
    $output['sidebar_help_button_url']  = hcmv_child_sanitize_url($input['sidebar_help_button_url'] ?? $defaults['sidebar_help_button_url']);
    $output['share_label']              = hcmv_child_sanitize_text($input['share_label'] ?? $defaults['share_label']);
    $output['toc_title']                = hcmv_child_sanitize_text($input['toc_title'] ?? $defaults['toc_title']);
    $output['breadcrumb_label']         = hcmv_child_sanitize_text($input['breadcrumb_label'] ?? $defaults['breadcrumb_label']);

    add_settings_error('hcmv_post_options', 'hcmv_post_saved', 'Đã lưu trang bài viết.', 'updated');

    return $output;
}

add_action('admin_init', function () {
    register_setting('hcmv_post_group', 'hcmv_post_options', 'hcmv_child_sanitize_post_options');
});

add_action('admin_menu', function () {
    add_theme_page(
        'HCMV Bài viết',
        'HCMV Bài viết',
        'manage_options',
        'hcmv-post-settings',
        'hcmv_child_render_post_settings_page'
    );
});

function hcmv_child_render_post_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $options = hcmv_child_get_post_options();
    ?>
    <div class="wrap hcmv-admin-wrap">
        <h1>HCMV Bài viết</h1>
        <p>Trang này điều khiển giao diện bài viết đơn. Nội dung bài viết vẫn chỉnh ở <strong>Posts</strong>.</p>
        <?php settings_errors('hcmv_post_options'); ?>

        <style>
            .hcmv-admin-wrap .hcmv-admin-grid {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px;max-width:1100px;}
            .hcmv-admin-wrap .hcmv-admin-card {background:#fff;border:1px solid #dcdcde;border-radius:16px;padding:20px;box-shadow:0 4px 18px rgba(0,0,0,.04);margin-bottom:20px;}
            .hcmv-admin-wrap .hcmv-admin-card h2 {margin-top:0;font-size:20px;}
            .hcmv-admin-wrap .hcmv-admin-field {margin-bottom:16px;}
            .hcmv-admin-wrap .hcmv-admin-field label {display:block;margin-bottom:6px;}
            .hcmv-admin-wrap .hcmv-admin-field input.regular-text,
            .hcmv-admin-wrap .hcmv-admin-field textarea,
            .hcmv-admin-wrap .hcmv-admin-field .large-text {width:100%;max-width:none;}
            .hcmv-admin-wrap .hcmv-media-box {display:flex;gap:16px;align-items:flex-start;flex-wrap:wrap;}
            .hcmv-admin-wrap .hcmv-media-preview {width:220px;height:140px;border:1px dashed #c9ccd1;border-radius:12px;background:#f8fafc;display:flex;align-items:center;justify-content:center;overflow:hidden;color:#64748b;}
            .hcmv-admin-wrap .hcmv-media-preview img {width:100%;height:100%;object-fit:cover;display:block;}
        </style>

        <form method="post" action="options.php">
            <?php settings_fields('hcmv_post_group'); ?>

            <div class="hcmv-admin-grid">
                <div>
                    <div class="hcmv-admin-card">
                        <h2>Khối bài liên quan bên phải</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề', 'hcmv_post_options[sidebar_recent_title]', $options['sidebar_recent_title']);
                        hcmv_child_admin_field('Số bài hiển thị (1-6)', 'hcmv_post_options[sidebar_recent_count]', $options['sidebar_recent_count'], 'number');
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Khối bản đồ</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề', 'hcmv_post_options[sidebar_map_title]', $options['sidebar_map_title']);
                        hcmv_child_admin_field('Mô tả', 'hcmv_post_options[sidebar_map_desc]', $options['sidebar_map_desc'], 'textarea');
                        hcmv_child_admin_image_field('Ảnh bản đồ/card', 'hcmv_post_options[sidebar_map_image_id]', $options['sidebar_map_image_id']);
                        hcmv_child_admin_field('Text nút', 'hcmv_post_options[sidebar_map_button_text]', $options['sidebar_map_button_text']);
                        hcmv_child_admin_field('Link nút', 'hcmv_post_options[sidebar_map_button_url]', $options['sidebar_map_button_url'], 'url');
                        ?>
                    </div>
                </div>

                <div>
                    <div class="hcmv-admin-card">
                        <h2>Khối hỗ trợ</h2>
                        <?php
                        hcmv_child_admin_field('Tiêu đề', 'hcmv_post_options[sidebar_help_title]', $options['sidebar_help_title']);
                        hcmv_child_admin_field('Mô tả', 'hcmv_post_options[sidebar_help_desc]', $options['sidebar_help_desc'], 'textarea');
                        hcmv_child_admin_field('Text nút', 'hcmv_post_options[sidebar_help_button_text]', $options['sidebar_help_button_text']);
                        hcmv_child_admin_field('Link nút', 'hcmv_post_options[sidebar_help_button_url]', $options['sidebar_help_button_url'], 'url');
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Text chung</h2>
                        <?php
                        hcmv_child_admin_field('Label chia sẻ', 'hcmv_post_options[share_label]', $options['share_label']);
                        hcmv_child_admin_field('Tiêu đề mục lục', 'hcmv_post_options[toc_title]', $options['toc_title']);
                        hcmv_child_admin_field('Breadcrumb giữa', 'hcmv_post_options[breadcrumb_label]', $options['breadcrumb_label']);
                        ?>
                    </div>

                    <div class="hcmv-admin-card">
                        <h2>Gợi ý dùng trong editor</h2>
                        <p>- Viết bài bình thường trong <strong>Posts</strong>; template sẽ tự render title, meta, mục lục, sidebar.</p>
                        <p>- Dùng heading <strong>H2/H3</strong> để mục lục tự sinh.</p>
                        <p>- Ảnh trong nội dung chèn bằng block Image như bình thường.</p>
                        <p>- Muốn có box highlight giống mockup, thêm class cho Group block: <code>hcmv-note-box</code> hoặc <code>hcmv-summary-box</code>.</p>
                    </div>
                </div>
            </div>

            <?php submit_button('Lưu trang bài viết'); ?>
        </form>
    </div>
    <?php
}

function hcmv_child_get_sidebar_posts($exclude_post_id = 0) {
    $options = hcmv_child_get_post_options();
    $count   = max(1, min(6, absint($options['sidebar_recent_count'])));
    $cat_ids = wp_get_post_categories($exclude_post_id);

    $args = array(
        'post_type'           => 'post',
        'posts_per_page'      => $count,
        'post_status'         => 'publish',
        'post__not_in'        => array($exclude_post_id),
        'ignore_sticky_posts' => true,
    );

    if (!empty($cat_ids)) {
        $args['category__in'] = $cat_ids;
    }

    $query = new WP_Query($args);
    $items = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $categories = get_the_category();
            $items[] = array(
                'title'    => get_the_title(),
                'url'      => get_permalink(),
                'category' => !empty($categories) ? $categories[0]->name : 'Tin mới',
            );
        }
        wp_reset_postdata();
    }

    return $items;
}

function hcmv_child_calculate_reading_time($content) {
    $word_count = str_word_count(wp_strip_all_tags($content));
    $minutes    = (int) max(1, ceil($word_count / 220));
    return $minutes;
}

function hcmv_child_generate_toc_and_content($html) {
    $toc   = array();
    $used  = array();

    $callback = function ($matches) use (&$toc, &$used) {
        $level      = strtolower($matches[1]);
        $attributes = $matches[2];
        $inner_html = $matches[3];
        $text       = trim(wp_strip_all_tags($inner_html));

        if ('' === $text) {
            return $matches[0];
        }

        if (preg_match('/\sid=("|\')(.*?)\1/i', $attributes, $existing)) {
            $id = sanitize_title($existing[2]);
        } else {
            $base = sanitize_title($text);
            if ('' === $base) {
                $base = 'section';
            }
            $id = $base;
            $i  = 2;
            while (in_array($id, $used, true)) {
                $id = $base . '-' . $i;
                $i++;
            }
            $attributes .= ' id="' . esc_attr($id) . '"';
        }

        $used[] = $id;
        $toc[]  = array(
            'id'    => $id,
            'text'  => $text,
            'level' => $level,
        );

        return '<' . $matches[1] . $attributes . '>' . $inner_html . '</' . $matches[1] . '>';
    };

    $new_html = preg_replace_callback('/<(h[23])(.*?)>(.*?)<\/\1>/is', $callback, $html);

    return array($new_html, $toc);
}

function hcmv_child_breadcrumb_items($post_id) {
    $items   = array();
    $items[] = array('label' => 'Trang chủ', 'url' => home_url('/'));

    $options = hcmv_child_get_post_options();
    if (!empty($options['breadcrumb_label'])) {
        $items[] = array('label' => $options['breadcrumb_label'], 'url' => hcmv_child_posts_url());
    }

    $categories = get_the_category($post_id);
    if (!empty($categories)) {
        $items[] = array('label' => $categories[0]->name, 'url' => get_category_link($categories[0]->term_id));
    }

    return $items;
}

/**
 * Shortcode: [hcmv_related_posts]
 * Hiển thị 5 bài viết cùng chuyên mục, dùng trong sidebar.
 * Dùng: [hcmv_related_posts title="Bài viết liên quan" count="5"]
 */
function hcmv_related_posts_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Bài viết liên quan',
        'count' => 5,
    ), $atts, 'hcmv_related_posts' );

    if ( ! is_singular( 'post' ) ) {
        return '';
    }

    $post_id    = get_the_ID();
    $categories = wp_get_post_categories( $post_id, array( 'fields' => 'ids' ) );

    if ( empty( $categories ) ) {
        return '';
    }

    $query = new WP_Query( array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => absint( $atts['count'] ),
        'post__not_in'        => array( $post_id ),
        'category__in'        => $categories,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
    ) );

    if ( ! $query->have_posts() ) {
        return '';
    }

    ob_start();
    ?>
    <div class="hcmv-related-posts">
        <h3 class="hcmv-related-title"><?php echo esc_html( $atts['title'] ); ?></h3>
        <ul class="hcmv-related-list">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php
                $thumb_id  = get_post_thumbnail_id();
                $thumb_url = $thumb_id
                    ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' )
                    : 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"><rect fill="%23e2e8f0" width="80" height="80"/></svg>';
                $thumb_alt = $thumb_id
                    ? trim( wp_strip_all_tags( get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) ) )
                    : get_the_title();
                $thumb_alt = $thumb_alt ?: get_the_title();
                ?>
                <li class="hcmv-related-item">
                    <a class="hcmv-related-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <img
                            class="hcmv-related-thumb"
                            src="<?php echo esc_url( $thumb_url ); ?>"
                            alt="<?php echo esc_attr( $thumb_alt ); ?>"
                            title="<?php the_title_attribute(); ?>"
                            width="72"
                            height="72"
                            loading="lazy"
                        >
                        <span class="hcmv-related-post-title"><?php the_title(); ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <style>
        .hcmv-related-posts {
            font-family: Inter, ui-sans-serif, system-ui, sans-serif;
        }
        .hcmv-related-title {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -.03em;
            margin: 0 0 14px;
            color: #21242c;
        }
        .hcmv-related-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 10px;
        }
        .hcmv-related-item {
            border-radius: 12px;
            overflow: hidden;
            background: #f8fafc;
            border: 1px solid rgba(15,23,42,.06);
            transition: box-shadow .2s ease;
        }
        .hcmv-related-item:hover {
            box-shadow: 0 4px 16px rgba(15,23,42,.08);
        }
        .hcmv-related-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            text-decoration: none;
            color: inherit;
        }
        .hcmv-related-thumb {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 10px;
            flex-shrink: 0;
            display: block;
            background: #e2e8f0;
        }
        .hcmv-related-post-title {
            font-size: 14px;
            font-weight: 600;
            line-height: 1.45;
            color: #334155;
            transition: color .18s ease;
        }
        .hcmv-related-item:hover .hcmv-related-post-title {
            color: #2f63ea;
        }
    </style>
    <?php
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'hcmv_related_posts', 'hcmv_related_posts_shortcode' );
// 1. Tạo Shortcode hiện bài viết liên quan chuẩn SEO
add_shortcode('hcmv_related_posts', 'hcmv_related_posts_callback');
function hcmv_related_posts_callback($atts) {
    global $post;
    $categories = get_the_category($post->ID);
    if (!$categories) return '';

    $args = array(
        'category__in' => array($categories[0]->term_id),
        'post__not_in' => array($post->ID),
        'posts_per_page' => 5,
        'orderby' => 'rand'
    );

    $query = new WP_Query($args);
    $output = '<div class="hcmv-side-list">';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<a class="hcmv-side-item" href="'.get_permalink().'">';
            $output .= '<small>'.get_the_category()[0]->name.'</small>';
            $output .= '<strong>'.get_the_title().'</strong>';
            $output .= '</a>';
        }
    } else {
        $output .= '<p>Chưa có bài viết liên quan.</p>';
    }
    $output .= '</div>';
    wp_reset_postdata();
    return $output;
}

/**
 * Khai báo hàm hiển thị "Chủ đề đang Hot" bị thiếu
 * Để hiển thị các từ khóa SEO Focus ở Sidebar.
 */
function hcmv_display_hot_topics() {
    $hot_tags = array(
        array('label' => 'Xét tuyển ĐHQG',    'url' => home_url('/?s=xet+tuyen+dhqg')),
        array('label' => 'Phòng trọ Thủ Đức', 'url' => home_url('/?s=phong+tro+thu+duc')),
        array('label' => 'Lịch xe buýt',      'url' => home_url('/?s=lich+xe+buyt')),
        array('label' => 'Tân sinh viên',     'url' => home_url('/?s=tan+sinh+vien')),
        array('label' => 'Việc làm thêm',     'url' => home_url('/?s=viec+lam+them')),
    );

    echo '<div class="hcmv-hot-topics-box">';
    echo '<h3 class="hcmv-related-title">Chủ đề đang Hot 🔥</h3>';
    echo '<div class="hcmv-hot-tags">';
    foreach ($hot_tags as $tag) {
        echo '<a href="' . esc_url($tag['url']) . '" class="hcmv-hot-tag">' . esc_html($tag['label']) . '</a>';
    }
    echo '</div></div>';

}
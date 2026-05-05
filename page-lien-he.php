<?php
get_header();
?>

<main id="primary" class="support-contact-page">

    <section class="contact-hero-section">
        <div class="support-wrap">
            <div class="contact-hero-grid">
                <div class="contact-hero-content">
                    <span class="contact-badge">KẾT NỐI VỚI CHÚNG TÔI</span>

                    <h1>Liên hệ</h1>

                    <p class="contact-lead">
                        Bạn muốn góp ý nội dung, đề xuất thông tin mới, hợp tác hoặc phản hồi về trải nghiệm
                        trên Làng Đại Học HCM? Chúng tôi luôn sẵn sàng lắng nghe để hoàn thiện nền tảng
                        tốt hơn cho sinh viên.
                    </p>

                    <div class="contact-actions">
                        <a class="contact-btn contact-btn-primary" href="mailto:nhom3.ec204@gmail.com">
                            Gửi email cho chúng tôi
                        </a>

                        <a class="contact-btn contact-btn-outline" href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">
                            Tìm hiểu về dự án
                        </a>
                    </div>
                </div>

                <div class="contact-hero-card">
                    <span class="mini-badge">EMAIL LIÊN HỆ</span>
                    <h2>nhom3.ec204@gmail.com</h2>
                    <p>
                        Chúng mình sẽ cố gắng phản hồi trong thời gian sớm nhất. Khi gửi email,
                        bạn nên ghi rõ nội dung cần hỗ trợ để chúng mình xử lý nhanh hơn.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="support-wrap">
            <div class="section-heading">
                <span class="section-badge">BẠN CÓ THỂ LIÊN HỆ VỀ</span>
                <h2>Những nội dung chúng tôi hỗ trợ</h2>
                <p>
                    Để việc phản hồi hiệu quả hơn, bạn có thể gửi thông tin theo từng nhóm nội dung dưới đây.
                </p>
            </div>

            <div class="contact-card-grid">
                <div class="contact-info-card">
                    <div class="contact-icon">01</div>
                    <h3>Góp ý nội dung</h3>
                    <p>
                        Báo lỗi thông tin, đề xuất cập nhật bài viết hoặc góp ý để nội dung trở nên
                        rõ ràng và hữu ích hơn cho sinh viên.
                    </p>
                </div>

                <div class="contact-info-card">
                    <div class="contact-icon">02</div>
                    <h3>Đề xuất chủ đề mới</h3>
                    <p>
                        Gợi ý các chủ đề về nhà trọ, ăn uống, đi lại, học tập, kỹ năng hoặc việc làm
                        mà sinh viên đang quan tâm.
                    </p>
                </div>

                <div class="contact-info-card">
                    <div class="contact-icon">03</div>
                    <h3>Hợp tác & chia sẻ</h3>
                    <p>
                        Liên hệ nếu bạn muốn chia sẻ nguồn thông tin, hợp tác nội dung hoặc cùng xây dựng
                        cẩm nang sinh viên tốt hơn.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section contact-section-soft">
        <div class="support-wrap">
            <div class="contact-two-col">
                <div class="contact-message-box">
                    <span class="section-badge">GỢI Ý KHI GỬI EMAIL</span>
                    <h2>Để được hỗ trợ nhanh hơn</h2>

                    <ul class="contact-check-list">
                        <li>Ghi rõ tiêu đề email, ví dụ: “Góp ý bài viết nhà trọ” hoặc “Đề xuất nội dung mới”.</li>
                        <li>Nêu rõ đường link bài viết hoặc chuyên mục liên quan nếu có.</li>
                        <li>Mô tả ngắn gọn vấn đề, nội dung cần chỉnh hoặc thông tin muốn bổ sung.</li>
                        <li>Đính kèm hình ảnh minh họa nếu cần để chúng mình kiểm tra dễ hơn.</li>
                    </ul>
                </div>

                <div class="contact-highlight-box">
                    <span class="mini-badge">THỜI GIAN PHẢN HỒI</span>
                    <h3>Chúng mình sẽ phản hồi sớm nhất có thể</h3>
                    <p>
                        Làng Đại Học HCM là dự án hướng đến sinh viên, vì vậy mọi góp ý đều rất quan trọng.
                        Chúng mình sẽ xem xét phản hồi và cập nhật nội dung khi phù hợp.
                    </p>

                    <a class="contact-email-link" href="mailto:nhom3.ec204@gmail.com">
                        nhom3.ec204@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="support-wrap">
            <div class="contact-cta-box">
                <div>
                    <span class="section-badge">KHÁM PHÁ THÊM</span>
                    <h2>Trước khi liên hệ, bạn có thể xem các chuyên mục chính</h2>
                    <p>
                        Một số thông tin bạn cần có thể đã được tổng hợp trong các chuyên mục dưới đây.
                    </p>
                </div>

                <div class="contact-cta-links">
                    <a href="<?php echo esc_url(home_url('/category/di-chuyen-tien-ich/')); ?>">Di chuyển & tiện ích</a>
                    <a href="<?php echo esc_url(home_url('/category/doi-song-sinh-vien/')); ?>">Đời sống sinh viên</a>
                    <a href="<?php echo esc_url(home_url('/category/hoc-tap-phat-trien-ky-nang/')); ?>">Học tập & phát triển kỹ năng</a>
                    <a href="<?php echo esc_url(home_url('/category/viec-lam-co-hoi-sinh-vien/')); ?>">Việc làm & cơ hội sinh viên</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
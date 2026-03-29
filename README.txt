1. Tải code về máy lần đầu (Clone)
git clone https://github.com/TuyenVont/web-langdhhcm

2. Cập nhật code mới nhất (Pull)
Trước khi bắt đầu làm việc mỗi ngày, nên chạy lệnh này để lấy những thay đổi mà người khác đã đẩy lên.
git pull origin main

3. Tạo nhánh mới để làm việc (Branching)
Để tránh việc mọi người sửa chồng chéo lên nhau trên nhánh chính (main), mỗi người nên làm việc trên một nhánh riêng.
# Tạo và chuyển sang nhánh mới (ví dụ: feature-header)
git checkout -b <ten_nhanh_moi>

4. Lưu và đẩy code lên GitHub (Add, Commit & Push)
Sau khi code xong một tính năng, thực hiện bộ 3 lệnh sau:

# 1. Gom tất cả các file đã thay đổi
git add .
# 2. Đặt tên cho lần thay đổi này (viết ngắn gọn, dễ hiểu)
git commit -m "Mô tả tính năng vừa làm"
# 3. Đẩy nhánh này lên GitHub
git push origin <ten_nhanh_dang_lam>

# HCMV Blocksy Child V3 Post Template (Updated 2026)
===================================

Đây là bản child theme cho Blocksy, được tối ưu cho cộng đồng sinh viên Làng Đại Học HCM.

### 🌟 TÍNH NĂNG CHÍNH
- **Homepage:** Hoàn toàn có thể chỉnh sửa trực tiếp trong Admin (Editable).
- **Single Post:** Layout kiểu editorial chuyên nghiệp, Sidebar thông minh (bản đồ, bài liên quan, CTA).
- **Mục lục (TOC):** Tự động sinh từ heading H2/H3.
- **Tương tác mới:** Tích hợp hệ thống Bình luận chuyên sâu, Nút phản hồi bài viết và FAQ Accordion.

---

### 🛠 CÀI ĐẶT & THIẾT LẬP
1. **Parent Theme:** Phải cài Blocksy trước.
2. **Upload & Activate:** Tải file ZIP child theme trong `Appearance > Themes`.
3. **Menu:** Gán menu tại `Appearance > Menus` cho 3 vị trí: Primary Menu, Footer Menu 1, Footer Menu 2.
4. **Customization:** - Logo: `Customize > Site Identity`.
   - Trang chủ: `Appearance > HCMV Homepage`.
   - Layout bài viết: `Appearance > HCMV Bài viết`.

---

### 👥 QUY TẮC LÀM VIỆC NHÓM (TEAM 4 NGƯỜI)
Để tránh xung đột code (Conflict) trên GitHub, các thành viên cần tuân thủ:

1. **PULL trước khi CODE:** Luôn `git pull` để cập nhật code mới nhất từ team về máy mình trước khi bắt đầu sửa.
2. **Commit rõ ràng:** Ghi chú rõ mình đã làm gì. Ví dụ: `Fix: Chỉnh lại màu xanh cho nút Đăng ký`.
3. **Chia nhánh (Branching):** Không đẩy code trực tiếp vào `main`. Mỗi người làm trên nhánh riêng (`tuyen-dev`, `member-ui`...) rồi gửi **Pull Request** để Admin duyệt.
4. **Phân chia file:**
   - **Giao diện:** Tập trung file `style.css` và thư mục `assets/css`.
   - **Tính năng:** Tập trung file `functions.php`.
   - **Layout:** Tập trung `single.php` và `front-page.php`.

---

### 📝 HƯỚNG DẪN VIẾT BÀI & TƯƠNG TÁC
Để bài viết chuẩn SEO và tăng tương tác, hãy sử dụng các tính năng sau:

* **Cấu trúc Heading:** Dùng H2/H3 để mục lục tự động hiển thị đẹp mắt.
* **Hệ thống Bình luận (wpDiscuz):** Đã tích hợp cuối bài viết. Admin nên vào trả lời để tạo cộng đồng.
* **Nút "Hữu ích":** Đặt cuối bài để thu thập ý kiến sinh viên (Yes/No).
* **FAQ Accordion:** Dùng block FAQ (khai báo Schema) cho các câu hỏi như: "Giờ đóng cửa?", "Cách đóng tiền điện?".
* **CSS Classes chuyên dụng:**
    - `.hcmv-note-box`: Tạo box highlight màu xanh dương.
    - `.hcmv-summary-box`: Tạo box tóm tắt/lời khuyên (khuyên dùng danh sách bullet).

---

### 📁 CẤU TRÚC THƯ MỤC ASSETS
Mọi người khi thêm tài nguyên vào web cần bỏ đúng chỗ:
- `assets/images/`: Chứa logo, icon, ảnh minh họa (vui lòng nén ảnh tại tinypng.com trước khi up).
- `assets/css/`: Chứa các file CSS bổ sung (nếu cần chia nhỏ khỏi file style chính).
- `assets/js/`: Chứa các hiệu ứng cuộn trang, dark mode hoặc xử lý form.

---

### ⚠️ LƯU Ý QUAN TRỌNG
- **Downtime:** Cẩn thận tuyệt đối khi sửa file `functions.php`. Hãy test trên Local trước khi push lên GitHub.
- **Featured Image:** Luôn thêm ảnh đại diện cho bài viết để Homepage không bị hiện ảnh placeholder.
- **Backup:** Luôn commit code hằng ngày để không bị mất dữ liệu nếu máy cá nhân gặp sự cố.

---

### 🚀 DỰ ĐỊNH CẬP NHẬT (ROADMAP)
- [ ] Tích hợp nút chuyển đổi giao diện Sáng/Tối (Dark Mode).
- [ ] Tối ưu Form đăng ký nhận bản tin qua Email.
- [ ] Nâng cấp khối "Bài viết xem nhiều nhất" theo lượt view thực tế.


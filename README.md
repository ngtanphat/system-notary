# NotaryOS - Hệ thống Quản trị Văn phòng Công chứng

## 1. Tổng quan Dự án (Overview)
NotaryOS là một hệ thống phần mềm ERP (Enterprise Resource Planning) được thiết kế đo ni đóng giày cho quy trình vận hành thực tế tại Văn phòng Công chứng. Hệ thống tập trung vào tính bảo mật, hiệu năng cao và khả năng hoạt động độc lập (Offline-first) ngay cả khi mất kết nối Internet quốc tế.

## 2. Ngăn xếp Công nghệ (Tech Stack)
*   **Backend:** Laravel (PHP)
*   **Cơ sở dữ liệu:** Microsoft SQL Server
*   **Frontend:** 
    *   HTML5 / Blade Template
    *   Tailwind CSS (Chạy nội bộ không cần Node.js/CDN)
    *   Alpine.js (Quản lý trạng thái, DOM thao tác nhẹ)
*   **Rich Text Editor:** TipTap (Xử lý hợp đồng động)

## 3. Kiến trúc Cơ sở dữ liệu (Database Schema)
Hệ thống sử dụng 100% tên bảng và trường dữ liệu bằng Tiếng Việt (chuẩn Snake Case) để sát với nghiệp vụ pháp lý, bao gồm 13 bảng cốt lõi:
1.  `vai_tro` (Quản lý phân quyền)
2.  `nguoi_dung` (Tài khoản nội bộ)
3.  `khach_hang` (Kho dữ liệu định danh)
4.  `tai_san` (Kho dữ liệu tài sản)
5.  `loai_ho_so` (Phân loại hợp đồng)
6.  `mau_in_hop_dong` (Lưu trữ template HTML)
7.  `ho_so` (Trung tâm xử lý nghiệp vụ)
8.  `ho_so_khach_hang` (Bảng trung gian pivot)
9.  `ho_so_tai_san` (Bảng trung gian pivot)
10. `luu_tru_vat_ly` (Định vị kho lưu trữ giấy)
11. `tai_lieu_dinh_kem` (Quản lý bản scan PDF/ảnh)
12. `vat_tu` (Quản lý văn phòng phẩm)
13. `lich_su_vat_tu` (Lịch sử tiêu hao)
14. `cai_dat_he_thong` (Tham số vận hành)

## 4. Kiến trúc Giao diện (UI Architecture)
*   **Master Layout:** Sử dụng nguyên tắc DRY (Don't Repeat Yourself) thông qua file `layouts/app.blade.php`.
*   **Độc lập nhận diện:** Trang đăng nhập được thiết kế tách biệt hoàn toàn khỏi Layout chính.
*   **Màu sắc thương hiệu:** Sử dụng hệ màu thiết lập sẵn `ntm-blue` (#004e89), `ntm-gold` (#cf9c3f), `ntm-dark` (#0a2540).

## 5. Tiến độ hiện tại
- [x] Giai đoạn 1: Thiết kế và chốt giao diện HTML tĩnh.
- [x] Giai đoạn 2: Xây dựng cấu trúc CSDL SQL Server và Models.
- [x] Giai đoạn 3: Tối ưu UI sang dạng Blade Layouts & Offline Assets.
- [ ] Giai đoạn 4: Viết Controller xử lý luồng Authentication (Đăng nhập).
- [ ] Giai đoạn 5: Phát triển các Module nghiệp vụ cốt lõi (CRUD).
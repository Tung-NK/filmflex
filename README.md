## Làm sao để chạy được thư mục
Thực hiện các bước sau để thiết lập dự án trên máy tính cá nhân của bạn:

1. Yêu cầu hệ thống:
- Cài đặt PHP (version >8.1 hoặc mới hơn).
- Cài đặt Composer (trình quản lý gói PHP).
- Cài đặt AngularCLI v18
- Cài đặt NodeJS v20
- Cài đặt git

2. Tiến hành download thư mục 
- Clone repository: git clone https://github.com/Tung-NK/filmflex.git.

3. Tiến hành cài đặt cấu hình chạy BackEnd
- Chuyển đến thư mục: cd backend.
- Chạy câu lệnh: composer install.
- Nếu báo lỗi "Your lock file does not contain a compatible set of packages. Please run composer update." thì chạy lệnh: composer update rồi chạy lại composer install. Không lỗi thì thôi 😁😄
- Chạy câu lệnh: npm install.
- Chạy câu lệnh: cp .env.example .env.
- Tạo key cho dự án: php artisan key:generate.
- Vào file .env sửa DB_DATABASE thành FilmFlex 
- Chạy câu lệnh: php artisan migrate để tạo database. Nếu hiện thông báo "[WARN] The database 'filmflex' does not exist on the 'mysql' connection." chọn y ấn enter
- Chạy câu lệnh: php artisan db:seed để tạo dữ liệu trên DATABASE

4. Tiến hành cài đặt cấu hình chạy FrontEnd
- Chuyển đến thư mục: cd main.
- Chạy câu lệnh: npm install.
- Chạy câu lệnh: ng serve


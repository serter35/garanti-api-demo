## ÖDÜYO CASE STUDY APP

### Tanıtım
Proje; Laravel, Vue, Inertia.js ve Tailwind teknolojileriyle geliştirilmiştir.
Proje üzerinden; terminal yönetimi, Garanti test ortamında 3d'siz ödeme akışı simüle edilebilecektir.
Ayrıca farklı kullanıcı türleriyle yetkilendirme durumları da gözlemlenebilir.

### Kurulum

1- Projenin kök dizininde, aşağıdaki komutlar sırasıyla çalıştırılır.
> chmod +x install.sh

> ./install.sh

Bu komut ile beraber paket kurulumları tamamlanıp, .env dosyası hazır hale getirilecektir. Ayrıca veritabanı oluşturma ve sahte kayıt oluşturma işlemleri tamamlanmış olması beklenir.

2- Aşağıdaki komutlar sırasıyla çalıştırıldığında, uygulama tarayıcı üzerinden erişilebilir olacaktır.
> php artisan serve

> npm run dev

http://127.0.0.1:8000 üzerinden yayınlanmaya başladığını uyarısında sonra tarayıcınızda açabilirsiniz.

### Kullanıcılar ve Panele Erişim

- admin@example.com - Role: Admin (Tüm İşlemleri Yapabilir)
- viewer@example.com - Role: Viewer (Terminal Güncelleme İşlemi Yapamaz)

Tüm kullanıcılar için şifre **password** olarak doldurulmalıdır.

### Ödeme Sayfası

Ödeme sayfasına, http://localhost:8000/orders/{order}/payments/create URL üzerinden erişilebilir.

```{order}``` dinamik rota parametresi olup, orders tablosundaki ```uuid``` kolonuyla doldurulmalıdır.

### Destek
Sorularınız olması durumunda **serter.serbest@gmail.com** hesabı üzerinden bana ulaşabilirsiniz.

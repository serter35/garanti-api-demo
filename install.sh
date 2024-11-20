#!/bin/bash
echo "Composer installation start"
composer install
echo "Composer installation successfully."

echo "Node package dependencies installation"
npm install
echo "Node package dependencies installation successfully."

# .env dosyasını .env.example'dan kopyalayalım
echo "Copying .env file..."
cp .env.example .env

# .env dosyasının kopyalanıp kopyalanmadığını kontrol edelim
if [ ! -f .env ]; then
    echo "Error: .env file was not copied successfully."
    exit 1
fi

echo ".env file copied successfully."

# Uygulama anahtarını (APP_KEY) oluşturmak için key:generate komutunu çalıştıralım
echo "Generating APP_KEY..."
php artisan key:generate

# Eğer APP_KEY oluşturulamazsa hatayı bildirelim
if [ $? -ne 0 ]; then
    echo "Error: Unable to generate APP_KEY."
    exit 1
fi

echo "APP_KEY generated successfully."

# Config cache'ini temizleyelim
echo "Clearing config cache..."
php artisan config:clear

# Veritabanı migration ve seeding işlemini yapalım
echo "Running migrations and seeding..."
php artisan migrate --seed --force

# İşlem tamamlandığında başarı mesajı
echo "Application installation successfully completed."

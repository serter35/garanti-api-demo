<?php

if (! function_exists('luhn_check')) {
    function luhn_check($cardNumber): bool
    {
        // Boşlukları temizleyelim ve sadece rakamları alalım
        $cardNumber = preg_replace('/\D/', '', $cardNumber);

        $sum = 0;
        $alt = false;

        // Kart numarasını tersten dolaş
        for ($i = strlen($cardNumber) - 1; $i >= 0; $i--) {
            $digit = (int)$cardNumber[$i];

            if ($alt) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $alt = !$alt; // Her adımda alternatifi değiştir
        }

        // Toplam 10'un katıysa geçerlidir
        return $sum % 10 === 0;
    }

    function garanti_password_hash(string $password, int $terminalId): string
    {
        $data = [
            $password,
            str_pad($terminalId, 9, 0, STR_PAD_LEFT)
        ];

        $shaData =  sha1(implode('', $data));

        return strtoupper($shaData);
    }
}

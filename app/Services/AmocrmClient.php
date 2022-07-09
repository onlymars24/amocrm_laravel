<?php

namespace App\Services;


class AmocrmClient

{
    
    public static function result($api){
        $subdomain = 'marselgalimov24'; //Поддомен нужного аккаунта
        $link = 'https://' . $subdomain . '.amocrm.ru'.$api; //Формируем URL для запроса
        /** Получаем access_token из вашего хранилища */
        $access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjAzZDg3ZGVlOWNmYTdmMDYxZWE1YzRjMmMwMjRmMzExMzdkOGYxZGNhMzRhNzVmY2FkZGI5NDBlMDMyMGExMzM4YTk3N2VkMjY2MWQ5MzU2In0.eyJhdWQiOiJkNjRjZDg4Zi00ZmYxLTRhZDgtOTQ2NC04NDIxZjAyZGU2NGUiLCJqdGkiOiIwM2Q4N2RlZTljZmE3ZjA2MWVhNWM0YzJjMDI0ZjMxMTM3ZDhmMWRjYTM0YTc1ZmNhZGRiOTQwZTAzMjBhMTMzOGE5NzdlZDI2NjFkOTM1NiIsImlhdCI6MTY1NzMwMzc2MSwibmJmIjoxNjU3MzAzNzYxLCJleHAiOjE2NTczOTAxNjEsInN1YiI6IjgzMzc1NzciLCJhY2NvdW50X2lkIjozMDI2MjcxNCwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImZpbGVzIiwiY3JtIiwiZmlsZXNfZGVsZXRlIiwibm90aWZpY2F0aW9ucyJdfQ.iE4oZZaLD9x8g9AmvsNipnZ2p3JE5ADVDkCBuA8rAgQVwmOH8uDe-ISWLwas0w_SNl5QfAB1pdjS2YN14UNs0f0aQV5Xm-zQTHadXeU0nCeTK4Zl0sUNjESmpbJKcrhRplTuC-mV060dRsh1ZaaFRzcWbEI02E6kFYDdEMc10Kt0YIn65uH3A3CYCI16jj960JaCaxPTVMgqQAHYiMoCLIAJCxs6TUYapFR6ohZi0qawTbLtsv8g8k8_049FMwaHvMeRNtAqLKBqpgckIXZMgGHMwpodq6tLXtj_bla7LE9Gj7dA4nQCoBq-mVWDB4P875PThEk2v25eGAY0TyeUPQ';
        /** Формируем заголовки */
        $headers = [
            'Authorization: Bearer ' . $access_token
        ];
        /**
         * Нам необходимо инициировать запрос к серверу.
         * Воспользуемся библиотекой cURL (поставляется в составе PHP).
         * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
         */
        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        /** Устанавливаем необходимые опции для сеанса cURL  */
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        /** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
    
        return $out;
    }
}

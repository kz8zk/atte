# アプリケーション名
勤怠管理システム【Atte(アット)】
ログイン後、ボタン押下することで勤務開始/終了時間と休憩開始/終了時間を管理する。

## 作成した目的
企業様の人事評価のために勤怠管理システムを作成した。

## アプリケーションURL
* 開発環境: http://localhost
* phpMyAdmin: http://localhost:8080

## 他のリポジトリ
## 機能一覧
* ログイン機能
* メール認証
* ログイン時、勤務状態によるボタン制御(勤務開始/終了、休憩開始/終了)
* 勤務時間/休憩時間管理
* 日付別勤怠管理

## 使用技術（実行環境）
* HTML
* CSS
* PHP 7.4.9
* Laravel 8.83.27
* MySQL 10.3.39

## テーブル設計
<img width="794" alt="テーブル設計" src="https://github.com/user-attachments/assets/d875bc35-a436-401b-8efc-05ac8eaa3980">

## ER図
<img width="1181" alt="ER図（初級模擬案件）" src="https://github.com/user-attachments/assets/6ba08dcc-9acd-40ee-aa00-dde064e876aa">

# 環境構築　　
Dockerビルド  
　1.　```git clone git@github.com:kz8zk/atte.git```  
　2.　DockerDesktopを立ち上げる  
　3.　```docker-compose up -d --build```

Laravel環境構築  
　1.　```docker-compose exec php bash```  
　2.　```composer install```  
　3.　「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成  
　4.　.envに以下の環境変数を追加  
 ```
　　　DB_CONNECTION=mysql  
　　　DB_HOST=mysql  
　　　DB_PORT=3306  
　　　DB_DATABASE=laravel_db  
　　　DB_USERNAME=laravel_user  
　　　DB_PASSWORD=laravel_pass  
```
  5. マイグレーションの実行  
   ```php artisan migrate```
     
  6. シーディングの実行  
   ```php artisan db:seed```

## 他に記載することがあれば記述する  
* シーダーファイル情報  
  ユーザー数:11人
   ```
            'name' => 'テスト太郎',
            'email' => 'User1@mailaddress.com'
            'password' => 'password'
  
            'name' => 'テスト次郎',
            'email' => 'User2@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト三郎'
            'email' => 'User3@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト四郎'
            'email' => 'User4@mailaddress.com'
            'password' => 'password'
        
            'name' => 'テスト五郎'
            'email' => 'User5@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト六郎'
            'email' => 'User6@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト七郎'
            'email' => 'User7@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト八郎',
            'email' => 'User8@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト九郎',
            'email' => 'User9@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト十郎'
            'email' => 'User10@mailaddress.com'
            'password' => 'password'

            'name' => 'テスト十一郎'
            'email' => 'User11@mailaddress.com'
            'password' => 'password'
  ```
  

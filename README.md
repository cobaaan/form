# アプリケーション名

## 環境構築
$ git clone git@github.com:coachtech-material/laravel-docker-template.git  
$ mv laravel-docker-template form  
$ git remote set-url origin git@github.com:cobaaan/form.git  
$ docker-compose up -d --build  
$ docker-compose exec php bash  
$ composer install  
$ php artisan make:migration create_contacts_table  
$ php artisan make:migration create_categories_table  
$ php artisan migrate  

## 使用技術(実行環境)
Laravel Framework 8.83.8  
PHP 7.4.9  
mysql  Ver 8.0.26  

## ER図
![form drawio](https://github.com/cobaaan/form/assets/77657934/595f2c6c-3ee8-4911-a271-f2e0647dffec)


## URL
開発環境：http://localhost/

## 未実装・不具合部分
1. Adminページ　テキスト検索とその他の検索の同時検索ができない
2. Adminページ　検索後にページネーションのボタンを押すと検索による絞り込みが解除される
3. Adminページ　ページネーションのボタンの色の指定がうまくいかなかった
4. Contactページ　性別選択のラジオボタンが選択した時に塗りつぶしにならない
5. Contactページ　お問い合わせの初期表示の選択してください、という文字の色と位置が指定できなかった
6. Contactページ　バリデーションエラー時に性別・お問い合わせの種類・お問い合わせの内容がクリアされる
7. contactsテーブル　ファクトリがうまくできず、idが1~35の順番にならなかった
8. contactsテーブル　ファクトリがうまくできず、住所が市からになっている
9. 画面サイズに合わせた表示が作り込めていない。時間が足りませんでした
10.検索を絞り込んだ状態で「エクスポート」ボタンを押すと絞り込んだ分でエクスポート　が実装出来ませんでした

私が気づいた未実装・不具合部分は以上です  
改善案をご教授いただけましたら幸いです

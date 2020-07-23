# docker-laravel

Laravel用のdocker

## バージョン
- nginx - 1.17.2
- php - 7.4.4
- mysql - 8.0.17
- Laravel - 7.2.2

## 手順
```bash
# 1.docker-compose.ymlの内容に基づいてイメージを作成する。
docker-compose build

# 2.docker-compose.ymlの内容に基づいてコンテナを作成・起動する。
docker-compose up -d

# 3.app内に入る。
docker-compose exec app bash

# 4.laravelプロジェクトを作成する。
laravel new プロジェクト名

# 5.作成したプロジェクトに移動する。
cd プロジェクト名

# 6.dockerのmysqlコンテナへ移動。

# 7.mysql内に入る。
docker-compose exec mysql bash

# 8.mysqlにログイン。
mysql -u root -p

# 9.userテーブルをセット。
use mysql;

# 10.一応確認。（caching_sha2_passwordだとlaravelがちゃんと動かない）
select user, host, plugin from user;

# 11.認証方式を変更。
ALTER USER 'ここを変えたいユーザー名'@'ホスト' IDENTIFIED WITH mysql_native_password BY '設定したパスワード';

# 12.mysqlコンテナから脱出。

# 13.app内に入る。
docker-compose exec app bash

# 14.作成したプロジェクトに移動する。
cd プロジェクト名

# 15.envの修正。
DB_HOST=mysql に変更。
DB_DATABASE を適切なものに変更。
DB_PASSWORD を適度なものに変更。

# 16.DBを綺麗に。
php artisan migrate


------
# 起動しているコンテナの確認
docker ps
```

[dockerコマンド参考](https://qiita.com/souichirou/items/6e701f6469822a641bdd)

## 気になる
- laravelのmigrateが動かない
  - user ではなく root なら動く
  - 認証方式をcaching_sha2_passwordからmysql_native_passwordに変更した。
```mysql
ALTER USER 'ここを変えたいユーザー名に'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
```
### わかったこと
- Mysql8からのデフォルト認証方式が変わった
    - PHPのMySQL接続ライブラリが caching_sha2_password　に未対応のため接続不可
- `caching_sha2_password` から `mysql_native_password` に変更する
- [参考URL](https://qiita.com/ucan-lab/items/3ae911b7e13287a5b917)

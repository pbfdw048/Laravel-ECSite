# LaraShop

## 概要

Laravel を使用して作成した EC サイトです。

## 環境

- PHP 7.4.10
- Laravel 7.28.4
- laravel/ui 2.4.1
- encore/laravel-admin 1.8.11
- laravel/scout 8.4.0
- algolia/algoliasearch-client-php 2.7.1
- MySQL 8.0.21
- nginx/ 1.18.0
- docker については[ucan-lab さんのテンプレート](https://github.com/ucan-lab/docker-laravel)を使用させていただきました（Compose file のバージョンを 3.7 に落としたり、インストールする Laravel のバージョンを 7.\*にしたり、phpMyAdmin を入れたり等、自分の環境や好みに合わせたカスタマイズはしています）。

## 特徴

- Eager ローディングでデータ取得（Eloquent\Builder では with メソッド、Algolia\ScoutExtended\Builder では load メソッド）
- Algolia のインデックス作成時にリレーションから属性を追加
- 注文処理時にトランザクションと占有ロックで整合性を保持
- ボタンクリック連打による多重送信の防止（トークンを再生成するミドルウェアの作成・登録と JS 側でのボタン無効化）
- 購入完了メールを非同期（ブラウザにレスポンス送信後）に送信

## 機能

- カート機能
- Laravel-admin を使用した商品管理
- laravel/scout（Algolia）を使用した商品検索
- 購入履歴ページ（一覧ページと詳細ページ）
- 購入完了メール送信機能 （送信のテストに Mailtrap を使用）
- 認証機能
- タグ機能

## デモ

- 基本の流れ（カートへ商品追加 -> カートから商品購入 -> 購入完了メールの送信 -> 受信メールから購入履歴詳細ページへ）

![基本フロー](https://user-images.githubusercontent.com/58397349/100139513-f26a6180-2ed2-11eb-8345-e011b445cbbb.gif)

- Laravel-admin を使用した商品管理（下のデモでは、商品名・在庫数・サムネイル・タグを変更）

![Laravel-admin を使用した商品管理](https://user-images.githubusercontent.com/58397349/100139692-31001c00-2ed3-11eb-9b1e-8301c5e09720.gif)

- laravel/scout（Algolia）を使用した商品検索

![商品検索](https://user-images.githubusercontent.com/58397349/100139594-0e6e0300-2ed3-11eb-86d4-7dda0e182d70.gif)

- 在庫不足時には購入不可

![在庫不足時には購入不可](https://user-images.githubusercontent.com/58397349/100140019-b4217200-2ed3-11eb-8738-5d4b340a873b.gif)

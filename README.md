# DotStudio-nginx
ドット絵作成共有SNSアプリです。
### 使用技術
#### バックエンド
- PHP 7.4.1
- Laravel 6.20.0
- postgreSQL 11.10
#### フロントエンド
- vue@2.6.12 （vuex,vue-router,その他ライブラリ）
- sass
- npm 6.14.10
#### インフラ
- docker 
- AWS（EC2,RDS,S3,ECS）※使う予定
### アプリの概要
ブラウザ上で手軽にドット絵を作成して共有するSNSアプリです。<br>コミュニケーションを促進する基本的な機能（いいね、コメント）を備えています。<br>また、ドット絵を描くのが苦手な方でも後述するスタンプ機能のおかげで他のクリエーターが作成した作品を組み合わせてオリジナルの作品を作成することができます。
### 機能一覧
- 管理ユーザ作成機能
- ログイン機能
- 投稿一覧表示
- 投稿詳細表示
- サムネイルの投稿（画像アップロード）、ユーザー名・挨拶文の編集
- ドット絵作成ツール（CRUD）
- いいね機能
- コメント機能
- フォロー機能
- フォロー・フォロワー一覧表示
- 管理ユーザー詳細表示
- 管理ユーザーごとの投稿表示
- 自分がいいねした投稿の表示
- いいね数・閲覧数・フォロワー数で判断したランキング表示（投稿・ユーザー）
- タグ・キーワードを使った投稿の検索機能（キーワード検索にはAlgoliaを使用）
- 他ユーザーが作成した作品を自分の作品に取り込むスタンプ機能
- 通知機能（投稿へのいいね・コメント、フォローされた、自分の投稿がスタンプとして使われた等）

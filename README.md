# My-portfolio
https://itochouchou.com/index.php
コロナ禍で集客に困っていた、母の化粧品店のWEBアプリをPHPで作成しました。

作った目的は主に
・離れてしまった常連さん達に対して、「息子がサイトを作ったので見てあげてください！」という形式で宣伝するきっかけになる。客層が僕の母の同年代ということもあり、母のために息子が作ったというニュースは響くと思ったし、お店をもう一度好きになってくれるきっかけになるのではないかと考えたため。

・お客さんに対面でメイクをしてあげて、気に入ってもらえたら購入してもらえるという販売形式である。なのでレッスン後に母のメイクがどうだったのかを星をつけたりコメントを書いてレビューできる機能をつけた。これにより毎回お客さんも自分が受けたサービスを振り返ることができるし、匿名なので正直に記入ができる。更にほかの人のレビューを見ることができるため、改めて評価が高いお店だなということも伝わる。新規顧客もレビューを見ることが出来るのでいいお店ということが伝えられると思う。
さらに母もお客さんからの平均的な評価を見ることが出来るので、良いところは自信になるし、悪い評価がつけば改善することができる。


＃サイトの機能の説明
１．トップページ
なるべく人の顔が多く映るように工夫した。
もともとyoutubeにアップされていた動画をサイト上で見れるようにしたり、3名のスタッフ全員の顔写真を貼って親近感を持たせた。また作成した私自身の写真も掲載してみた。お客さんたちにも可愛がっていただいていたので、よりサイトを好きになってもらうため、少し照れはあったがあえて掲載することで僕の熱意とお店への愛を伝えたかった。

背景はお化粧品店ということで上品な雰囲気を出したかったので白を基調とした。レスポンシブ対応も果たしており、スマホで見るとメニューが上部にボタンとして固定で表示される。初めはメニューも白だったが、サイトに慣れていないお母さま層にメニューというのが伝わらなかったので、ピンクに変更して分かりやすくしている。

最後にグーグルマップを利用してお店へのアクセスをわかりやすく表示した。初めてのお客様でも簡単にご来店が可能。さらにFacebookとインスタにも簡単に飛んでもらえるようリンクを張り付けておいたので、フォロワー増加も期待できる。


＃ログイン機能
オブジェクト指向を用いて作成した。新規登録とログインが可能。それぞれバリデーションを設けている。
新規登録時
・未入力は無いか
・メールアドレスの形式か
・同じメールアドレスは無いか
・パスワードが8文字以上か
・パスワードが一致しているか
・すでにこのパスワードが使われていないか

ログイン時
・未入力は無いか
・メールアドレスの形式か
・パスワードが8文字以上か
・パスワードがとメールアドレスが一致しているか

というバリデーションを行い、これらがクリアされるとセッションを与えログイン出来る。
ログインが無いと予約ができないので、顧客が誤って予約することも減らせるし、会員登録してくれる顧客も増える。


＃予約機能
こちらもオブジェクト指向を用いた。
ログインセッションを持たないユーザーは予約を完了できない。

後に記述する母の不都合な時間を登録する機能と同じテーブルを使用。
また、予約が入るとその日時をDBに登録される。そのため、予約を入れることができないが時間が生じる。

そこでホットペッパー等で見られる、予約できる時間を〇✖で表示できる機能を考えた。
母の基本レッスン時間は1時間ほど。なのでＤＢに登録されている時間はもちろん✖。さらに登録された時間の前後1時間は全て✖と表示できるようにした。これによりダブルブッキングを防ぐことができるし、母の登録と顧客の予約を一括で管理できるので、母の手間もかなり省くことができる。

そして予約が完了すると顧客にも母にもメールが送信される。そのためサイトをたびたびチェックする必要がなくなる。
また、ログイン時に顧客情報を取得しているので、個人情報を入力しなくても予約ができる。セッションに保存された情報をそのままＤＢに登録する。


＃お客様の感想、レビュー
先ほども記述したが、サイトの評価をできる。
入力欄へのリンクはサイト上にはなく、基本は顧客が来店し、メイクを終えた方にのみＱＲコードを用いて入力していただく。記入は匿名で行われる。
なので正直なレビューとかコメントが集まる。
褒められるだけとか★５だけのページは見る人から評価されないと考えたので、正直な評価を集められたことは自信になった。

他には星の平均値をDBから取得して、その値が★5に対して何パーセントなのか計算し、その割合の大きさを見やすいように星として表示している。


＃マイページ
ログインをすると使用可能になる。簡単な機能のみだが
・ログアウト
・予約した時間を一覧で表示
という機能である。



＃管理者機能
あらかじめ用意しておいた母のアカウントでログインすると管理者ページへ移動できる
主な機能は
・都合の悪い日時を登録
・入っている予約を確認
・書き込みを削除する機能（ミスや荒らしなど）
・ユーザーのアカウントの管理機能
を作りました。
母が使うものなのでUIをとてもシンプルにしました。
工夫した点は
・都合の悪い日の登録機能をカレンダーを用いて見やすく表示
・一日丸ごと都合が悪いボタンの実装
・コメントを消すときは、画面は上は普通の掲示板だが、母のログイン時はコメントの横に削除ボタンを付与。
・全ての処理の前に、本当に行いますか？という確認を実装。

これらの機能は私が使う分には必要の無い機能ですが、母が使うということもありとにかくシンプルさと確認を入れたりと、より誰でも安心して使える分かりやすい機能にした。


はじめて完全に作ったサービスということもあり、まだまだ不完全な点があると思いますし、ほぼ一人で作ったということもあり、自分の力不足をとプログラミングの難しさを実感しました。なのでこれからも学びを継続して、
・より安心して使えるサービス
・正しく見やすいコード
・より使われているフレームワークや言語
・使いやすい機能
・人に求められる機能
・それらを実現するためのスキルや知識
・チーム開発
・顧客とのコミュニケーション
・テスト
・アフターフォロー

など今回学ぶことができなかった様々な知識を学べるような企業と出会いたいと思います。





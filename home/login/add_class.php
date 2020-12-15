<?php
// レジスタークラス(新規登録)
class Register
{
    private $params;
//バリデーション関数
    public function Validation()
    {
        //エラーがあればここにエラーメッセージをいれる
        $err = [];
        //POSTをフィルターにかけて連想配列にする
        $this->params = filter_input_array(INPUT_POST, [
            'user_name' => FILTER_DEFAULT,
            'email' => FILTER_DEFAULT,
            'password' => FILTER_DEFAULT,
            'password_conf' => FILTER_DEFAULT
        ]);
        //入力が空だった時のバリデーション
        foreach ((array)$this->params as $key => $value) {
            if ($value === '') {
                $err[] = $this->checkInput($key);
            }
        }
        //メールの入力エラーチェック
        if ($this->params['email'] !== '' && $this->mailCheck($this->params['email'])) {
            $err[] = "メールアドレスの入力に誤りがあります";
        }
        //パスワードが一致しているかチェック
        $pass = $this->params['password'];
        $pass_conf = $this->params['password_conf'];

        if ($pass !== $pass_conf) {
            $err[] = 'パスワードが一致しません。';
        }
        $countpass=strlen($this->params['password']);
        if($countpass<8) {
            $err[] = 'パスワードは8文字以上入力してください';
        }
        //エラーがあれば格納
        return $err;
    }
    //オブジェクトを変数に代入、確認パスは不要なので削除
    public function getUserInfo()
    {
        $user = (object)$this->params;
        unset($user->password_conf);
        return $user;
    }
    //エラーに合ったメッセージを返す
    private function checkInput($value)
    {
        if($value==='user_name') {
            $err = '名前は入力必須です。';
            return $err;
        } elseif ($value==='email') {
            $err = 'メールアドレスは入力必須です。';
            return $err;
        } elseif ($value==='password') {
            $err = 'パスワードは入力必須です。';
            return $err;
        }elseif ($value==='password_conf') {
            $err = '確認用パスワードは入力必須です。';
            return $err;
        }
    }
    //メアドの正規表現。誤っていればtrueが返される。
    private function mailCheck($mail)
    {
        $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
        if (preg_match($reg_str, $mail)) {
            return  false;
        } else {
            return true;
        }
    }
}
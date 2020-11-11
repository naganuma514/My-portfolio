<?php
// レジスタークラス(新規登録)
class Register
{
    private $params;

    public function Validation()
    {
        $err = [];

        $this->params = filter_input_array(INPUT_POST, [
            'user_name' => FILTER_DEFAULT,
            'phone' => FILTER_DEFAULT,
            'email' => FILTER_DEFAULT,
            'course' => FILTER_DEFAULT,
            'booktime' => FILTER_DEFAULT
        ]);

        foreach ((array)$this->params as $key => $value) {
            if ($value === '') {
                $err[] = $this->checkInput($key);
            }
        }


        return $err;
    }

    public function getUserInfo()
    {
        $user = (object)$this->params;
        return $user;
    }

    //値がPOSTされていれば、フィルターを適用し、プロパティに代入。
    private function checkInput($value)
    {
        if($value==='user_name') {
            $err = 'ご予約にはログインが必要です';
            return $err;
        } elseif ($value==='email') {
            $err = 'ご予約にはログインが必要です';
            return $err;
        } elseif ($value==='phone') {
            $err = 'ご予約にはログインが必要です';
            return $err;
        }elseif ($value==='course') {
            $err = 'ご予約にはログインが必要です';
            return $err;
        }elseif ($value==='booktime') {
            $err = 'ご希望の時間が選択されていません';
            return $err;
        }
    }

    //メアドの正規表現。誤っていればtrueが返される。
    

   
    
}


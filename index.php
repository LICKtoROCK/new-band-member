<?php
    $username = 'dbuser';
    $password = 'dbpass';

    $database = new PDO('mysql:host=localhost;dbname=band_members;charset=UTF8;', $username, $password);

    if (array_key_exists('name', $_POST)) {
      $sql = 'insert into posts (name) values(:name)';
      $statement = $database->prepare($sql);
      $statement->bindParam(':name', $_POST['name']);
      $statement->execute();
      $statement = null;
    }
    
    if (array_key_exists('prefectures', $_POST)) {
      $sql = 'insert into posts (prefectures) values(:prefectures)';
      $statement = $database->prepare($sql);
      $statement->bindParam(':prefectures', $_POST['prefectures']);
      $statement->execute();
      $statement = null;
    }
    
    if (isset($_POST['$parts']) && is_array($_POST['$parts'])) {
      $parts = implode(",", $_POST["parts"]);
      $sql = 'insert into posts (parts) values(:parts)';
      $statement = $database->prepare($sql);
      $statement->bindParam(':parts', $_POST['$parts']);
      $statement->execute();
      $statement = null;
    }
    
    if (array_key_exists('pr', $_POST)) {
      $sql = 'insert into posts (pr) values(:pr)';
      $statement = $database->prepare($sql);
      $statement->bindParam(':pr', $_POST['pr']);
      $statement->execute();
      $statement = null;
    }
var_dump($_POST);
    $sql = 'SELECT * FROM posts ORDER BY created_at DESC';
    $statement = $database->query($sql);
    $records = $statement->fetchAll();

    $statement = null;
    $database = null;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>バンドメンバー募集掲示板</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">

  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-js-modal@1.3.31/dist/index.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        
        <div class="d-grid gap-2 col-5">
          <button type="button" v-on:click="show" class="btn btn-danger btn-lg">
            <i class="fas fa-users"></i> メンバーを募集する
          </button>
          
          <modal name="recruit" :width="500" :height="700" :resizable="true" :adaptive="true">
            <div class="modal-header">
              <h3>メンバーを募集する</h3>
            </div>
            <div class="modal-body">
              <form action="index.php" method="POST">
              
                <div class="form-group mb-4">
                  <label for="inputName" class="form-label">名前（ＨＮ）</label>
                  <input class="form-control" name="name" id="inputName" required>
                </div>
              
                <div class="form-group mb-4">
                  <label for="selectPrefectures">都道府県</label>
                  <select class="form-select" name="prefectures" id="selectPrefectures" required>
                    <option selected disabled>選択してください</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                  </select>
                </div>
                
                <div class="form-group mb-4">
                  <label class="control-label">募集パート</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ボーカル" id="vocal">
                    <label class="form-check-label" for="vocal">ボーカル</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ギターボーカル" id="guitarVocal">
                    <label class="form-check-label" for="guitarVocal">ギターボーカル</label>
                  </div>
                  <div class="form-check  form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ギター" id="guitar">
                    <label class="form-check-label" for="guitar">ギター</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ベース" id="bass">
                    <label class="form-check-label" for="bass">ベース</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ドラム" id="drums">
                    <label class="form-check-label" for="drums">ドラム</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="キーボード" id="keyboard">
                    <label class="form-check-label" for="keyboard">キーボード</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="管楽器" id="brass">
                    <label class="form-check-label" for="brass">管楽器</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="弦楽器" id="strings">
                    <label class="form-check-label" for="strings">弦楽器</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="ＤＪ" id="dj">
                    <label class="form-check-label" for="dj">ＤＪ</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="parts[]" value="その他" id="etc">
                    <label class="form-check-label" for="etc">その他</label>
                  </div>
                </div>
                
                <div class="form-group mb-5">
                  <label for="inputPr" class="form-label">自己ＰＲ</label>
                  <textarea class="form-control" name="pr" id="inputPr" rows="6" required></textarea>
                </div>
                
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-danger" name="submit_add_post" type="submit">投稿する</button>
                </div>
              </form>
            </div>
          </modal>
        </div>

        <div class="d-grid gap-4 d-md-flex justify-content-right">
          <button type="button" v-on:click="show2" class="btn btn-success btn-lg">
            <i class="fas fa-map-marker-alt"></i> 都道府県から検索
          </button>
          
          <modal name="searchPrefectures" :width="720" :height="800" :resizable="true">
            <div class="modal-header">
              <h3>都道府県から検索</h3>
            </div>
            
            <div class="modal-body">
              <p>希望する都道府県をクリックしてください。</p>
              <iframe src="japan/prefectures.html" width="700" height="670" frameborder="0" style="border: none"></iframe>
            </div>
          </modal>
        
        
          <button type="button" v-on:click="show3" class="btn btn-warning btn-lg">
            <i class="fa-solid fa-guitar"></i> 募集パートから検索
          </button>
          
          <modal name="searchParts" :width="700" :height="400" :resizable="true">
            <div class="modal-header">
              <h3>募集パートから検索</h3>
            </div>
            <div class="modal-body">
              <label class="control-label mb-4">希望するパートを選んでください。</label><br>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ボーカル" id="vocal">
                <label class="btn btn-outline-warning" for="vocal"><img src="icon/icon1.png">ボーカル</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ギターボーカル" id="guitarVocal">
                <label class="btn btn-outline-warning" for="guitarVocal"><img src="icon/icon2.png">ギターボーカル</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ギター" id="guitar">
                <label class="btn btn-outline-warning" for="guitar"><img src="icon/icon3.png">ギター</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ベース" id="bass">
                <label class="btn btn-outline-warning" for="bass"><img src="icon/icon4.png">ベース</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ドラム" id="drums">
                <label class="btn btn-outline-warning" for="drums"><img src="icon/icon5.png">ドラム</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="キーボード" id="keyboard">
                <label class="btn btn-outline-warning" for="keyboard"><img src="icon/icon6.png">キーボード</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="管楽器" id="brass">
                <label class="btn btn-outline-warning" for="brass"><img src="icon/icon7.png">管楽器</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="弦楽器" id="strings">
                <label class="btn btn-outline-warning" for="strings"><img src="icon/icon8.png">弦楽器</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="ＤＪ" id="dj">
                <label class="btn btn-outline-warning" for="dj"><img src="icon/icon9.png">ＤＪ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="btn-check" type="checkbox" value="その他" id="etc">
                <label class="btn btn-outline-warning" for="etc"><img src="icon/icon10.png">その他</label>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto mt-5">
                <button class="btn btn-warning" type="button">検索する</button>
              </div>
            </div>
          </modal>
        </div>
        
      </div>
    </nav>
    
    <div class="cover mt-5">
      <div class="carousel">
        <div><img src="cover/cover1.jpg"></div>
        <div><img src="cover/cover2.jpg"></div>
        <div><img src="cover/cover3.jpg"></div>
        <div><img src="cover/cover4.jpg"></div>
        <div><img src="cover/cover5.jpg"></div>
      </div>
      <div class="catch">
        バンドメンバー募集掲示板へようこそ！<br>
        <span class="subcatch">音楽の趣味が合う仲間が貴方をまっています。</span>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header　text-center">
          <h5>投 稿 一 覧 <i class="fas fa-comment-dots"></i></h5>
        </div>

        <ul class="list-droup list-group-flush">
<?php
    if ($records) {
        foreach ($records as $record) {
            $name = $record['name'];
            $created_at = $record['created_at'];
            $prefectures = $record['prefectures'];
            $parts = $record['parts'];
            $pr = $record['pr'];
?>
          <li class="list-group-item">
            <p><strong>名前(HN)</strong>：<?php print htmlspecialchars($name, ENT_QUOTES, "UTF-8");  ?> &emsp; &emsp; <strong>投稿日時</strong>：<?php print htmlspecialchars($created_at, ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong>都道府県</strong>：<?php print htmlspecialchars($prefectures, ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong>募集パート</strong>：<?php print htmlspecialchars($parts, ENT_QUOTES, "UTF-8"); ?></p>
            <p><strong><?php print htmlspecialchars($pr, ENT_QUOTES, "UTF-8"); ?></strong></p>
          </li>
<?php
        }
    } else {
        echo 'まだ投稿がありません！募集をして仲間を見つけましょう！';
    }
?>
        </ul>
        
      </div>
    </div>
    
  </div>

  <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="./js/carousel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f170ca01bf.js" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>

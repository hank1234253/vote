<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <?php
    include_once "../db.php";
    $sql = "select * from `topics` where `id`='{$_GET['id']}'";
    $row = $pdo->query($sql)->fetch();
    ?>
    <h1>編輯主題</h1>
    <form action="../api/edit_vote.php" method="post">
        <div>
            <label for="">主題說明:</label>
            <input type="text" name="subject" id="subject" class="subject" value="<?= $row['subject'] ?>">
        </div>
        <div class="time-set">
            <label for="">開放時間:</label>
            <input type="datetime-local" name="open_time" id="open_time" value="<?= $row['open_time'] ?>">
            <label for="">關閉時間:</label>
            <input type="datetime-local" name="close_time" id="close_time" value="<?= $row['close_time'] ?>">
        </div>
        <div>
            <label for="">單複選:</label>
            <input type="radio" name="type" value="1" <?=$row['type']==1?'checked':''?>>單選&nbsp;&nbsp;
            <input type="radio" name="type" value="2" <?=$row['type']==2?'checked':''?>>複選
            
        </div>
        <hr>
        <div class="options">
            <button type="button" onclick="addDiv()">新增選項欄位</button>
            <?php
            $sql="select * from `options` where `subject_id`='{$row['id']}'";
            $options=$pdo->query($sql)->fetchAll();
            foreach($options as $opt){
            ?>
            <div>
                <label for="">項目:</label>
                <input type="hidden" name="opt_subject_id[]" value="<?=$opt['id']?>">
                <input type="text" name="description[]" class="description" value="<?=$opt['description']?>">
                <span onclick="addDiv()">+</span>
                <span onclick="delDiv(this)">-</span>
            </div>
            <?php
            }
            ?>
        </div>
        <div>
            <input type="hidden" name="subject_id" value="<?=$row['id']?>">
            <input type="submit" value="編輯">
            <button type="button" onclick="location.href='../backend.php'">取消</button>
        </div>
    </form>
    <script>
    function addDiv() {
            $(".options").append(
            `<div>
                <label for="">項目:</label>
                <input type="text" name="description[]" class="description">
                <span onclick="addDiv()">+</span>
                <span onclick="delDiv(this)">-</span>
            </div>`);
        }

        function delDiv(el) {
            let dom = $(el).parent();
            dom.remove();
        }
    </script>
</body>

</html>
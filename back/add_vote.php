<?php
$tmp = $_GET['option'] ?? 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <main>
        <h1>新增主題</h1>
        <form action="../api/add_vote.php" method="post">
            <div>
                <label for="">主題說明:</label>
                <input type="text" name="subject" id="subject" class="subject">
            </div>
            <div class="time-set">
                <label for="">開放時間:</label>
                <input type="datetime-local" name="open_time" id="open_time">
                <label for="">關閉時間:</label>
                <input type="datetime-local" name="close_time" id="close_time">
            </div>
            <div>
                <label for="">單複選:</label>
                <input type="radio" name="type" value="1">單選&nbsp;&nbsp;
                <input type="radio" name="type" value="2">複選
            </div>
            <hr>
            <div class="options">
                <div>
                    <label for="">項目:</label>
                    <input type="text" name="description[]" class="description">
                    <span onclick="addDiv()">+</span>
                </div>
                <div>
                    <label for="">項目:</label>
                    <input type="text" name="description[]" class="description">
                    <span onclick="addDiv()">+</span>
                    <span onclick="delDiv(this)">-</span>
                </div>
            </div>
            <div>
                <input type="submit" value="新增">
            </div>
        </form>
    </main>
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
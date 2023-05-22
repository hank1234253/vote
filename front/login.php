<?php
if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo "帳號或密碼錯誤";
    echo "</span>";
}
?>
<form action="./api/login.php" method="post">
    <div>
        <label for="acc">帳號</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <input type="submit" value="登入">
        <button type="button" onclick="location.href=`index.php`">取消</button>
    </div>
</form>
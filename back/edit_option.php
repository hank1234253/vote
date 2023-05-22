<?php
$option=$pdo->query("select * from `options` where `id`='{$_GET['id']}'")->fetch();
?>
<h1>編輯選項</h1>
<form action="./api/edit_option.php" method="post">
<div>
<label for="">選項名稱</label>
<input type="text" name="name" value="<?=$option['description']?>">
</div>
<div>
<label for="">票數</label>
<input type="number" name="total" value="<?=$option['total']?>">
</div>
<div>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="submit" value="送出">
    <input type="reset" value="重置">
    <button type="button" onclick="location.href='?do=result&id=<?=$option['subject_id']?>'">取消</button>
</div>
</form>
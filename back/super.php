<h1>會員權限管理</h1>
<?php
$sql="select * from `members`";
$mems=$pdo->query($sql)->fetchAll();
?>
<table>
    <tr>
        <td>會員</td>
        <td>權限</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($mems as $mem){
    ?>
    <tr>
        <form action="./api/change_pr.php" method="post">
        <td><?=$mem['name']?></td>
        <td>
            <select name="pr">
                <option value="super" <?php if($mem['pr']=='super')echo "selected";?>>超級管理員</option>
                <option value="admin" <?php if($mem['pr']=='admin')echo "selected";?>>管理員</option>
                <option value="member" <?php if($mem['pr']=='member')echo "selected";?>>會員</option>
            </select>
        </td>
        <td>
            <input type="hidden" name="id" value="<?=$mem['id']?>">
            <button type="submit">編輯</button>
            <button type="button">刪除</button>
        </td>
        </form>
    </tr>
    <?php
    }
    ?>
</table>
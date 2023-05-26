<?php
$sql="select * from `logs` where `topic_id`= '{$_GET['sub_id']}'";
$logs=$pdo->query($sql)->fetchAll();
?>
<table>
    <tr>
        <td>會員</td>
        <td>投票時間</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($logs as $log){
        $name=$pdo->query("select `name` from `members` where `id` = '{$log['mem_id']}'")->fetchColumn();
        if($name==''){
            $name="一般訪客";
        }
    ?>
    <tr>
        <form action="./api/del_log.php" method="post">
            <td><?=$name?></td>
            <td><?=$log['vote_time']?></td>
            <td>
                <input type="hidden" name="id" value="<?=$log['id']?>">
                <input type="hidden" name="subject" value=<?=$_GET['sub_id']?>>
                <button type="submit">刪除</button>
            </td>
        </form>
    </tr>
    <?php
    }
    ?>
</table>

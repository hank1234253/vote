<?php
$topic=$pdo->query("select * from `topics` where `id` ='{$_GET['id']}'")->fetch();
$options=$pdo->query("select * from `options` where `subject_id` ='{$_GET['id']}'")->fetchAll();
if($topic['login']==1){
if(!isset($_SESSION['login'])){
    $_SESSION['position']="../index.php?do=vote&id={$_GET['id']}";
    header("location:./index.php?do=login&msg=1");
}else{
    unset($_SESSION['position']);
}
}
?>
<h1>投票</h1>
<h2><?=$topic['subject']?></h2>
<form action="./api/vote.php" method="post">
<ul>
    <?php
    foreach($options as $index=> $opt){
        echo "<li>";
        switch($topic['type']){
            case 1:
                echo "<input type='radio' name='desc' value='{$opt['id']}'>";
            break;
            case 2:
                echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
            break;
        }
        echo "<span>".($index+1).".</span>";
        echo "<span>{$opt['description']}</span>";
        echo "</li>";
    }
    ?>
</ul>
<input type="hidden" name="subject_id" value="<?=$_GET['id'];?>">
<input type="submit" value="投票">
<button type="button" onclick="location.href='?'">取消</button>
</form>

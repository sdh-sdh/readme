<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <a href="<?php echo U($sid, ['sid'=>'1-3年']);?>">sid1</a>
    <a href="<?php echo U($sid, ['sid'=>'3-5年']);?>">sid2</a>
    <a href="<?php echo U($sid, ['sid'=>'5-10年']);?>">sid3</a>
    <a href="<?php echo U($sid, ['sid'=>'10年']);?>">sid4</a>
    <br><br>
    <a href="<?php echo U($qid, ['qid'=>1]);?>">qid1</a>
    <a href="<?php echo U($qid, ['qid'=>2]);?>">qid2</a>
    <a href="<?php echo U($qid, ['qid'=>3]);?>">qid3</a>
    <a href="<?php echo U($qid, ['qid'=>4]);?>">qid4</a>
    <br><br>
    <a href="<?php echo U($zid, ['zid'=>1]);?>">zid1</a>
    <a href="<?php echo U($zid, ['zid'=>2]);?>">zid4</a>
    <a href="<?php echo U($zid, ['zid'=>3]);?>">zid4</a>
    <a href="<?php echo U($zid, ['zid'=>4]);?>">zid4</a>
    <br><br>
    <a href="<?php echo U($aid, ['aid'=>1]);?>">aid1</a>
    <a href="<?php echo U($aid, ['aid'=>2]);?>">aid2</a>
    <a href="<?php echo U($aid, ['aid'=>3]);?>">aid3</a>
    <a href="<?php echo U($aid, ['aid'=>4]);?>">aid4</a>
    <br><br>
</body>
</html>
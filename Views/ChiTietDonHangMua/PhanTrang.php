<div class="container">
    <?php 
            if($current > 3) { 
            $first = 1; 
        ?>
        <a class="paging-link paging-link-first " href="?<?php echo isset($_GET['id']) ? "id=" . $_GET['id'] : ""; ?>&per_page=<?=$item?>&page1=<?=$first?>">First</a>
        <?php }
        if($current > 1) {
            $prev = $current - 1; ?>
        <a class="paging-link" href="?<?php echo isset($_GET['id']) ? "id=" . $_GET['id'] : ""; ?>&per_page=<?=$item?>&page=<?=$prev?>">Prev</a>
    <?php } ?>

    <?php
        for($num=1; $num<=$totalPage;$num++) { ?>
        <?php 
            if($num != $current) { ?>
        <?php 
            if($num > $current - 3 && $num < $current + 3) { ?>
        <a class="paging-link" href="?<?php echo isset($_GET['id']) ? "id=" . $_GET['id'] : ""; ?>&per_page=<?=$item?>&page=<?=$num?>"><?=$num?></a>
        <?php } ?>
        <?php } else { ?>
        <strong class="paging-link-select"><?=$num?></strong>
        <?php } ?>
    <?php } ?>

    <?php 
            if($current < $totalPage - 1) {
            $next = $current + 1;
        ?>
            <a class="paging-link" href="?<?php echo isset($_GET['id']) ? "id=" . $_GET['id'] : ""; ?>&per_page=<?=$item?>&page=<?=$next?>">Next</a>
        <?php } 
        if($current < $totalPage - 3) {
            $end = $totalPage; ?>
            <a class="paging-link paging-link-last" href="?<?php echo isset($_GET['id']) ? "id=" . $_GET['id'] : "";?>&per_page=<?=$item?>&page=<?=$end?>">Last</a>
    <?php } ?>
</div>



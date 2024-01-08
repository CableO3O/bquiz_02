<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table style="width: 95%; margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width="20%">人氣</th>
        </tr>
        <tr>
            <?php
            $total = $News->count(['sh' => 1]);
            $div = 5;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
            foreach ($rows as $idx => $row) {
            ?>
        <tr>
            <td>
                <div class="title" data-id="<?= $row['id']; ?>">
                    <?= $row['title']; ?>
                </div>
            </td>
            <td>
                <div>
                    <?= mb_substr($row['news'], 0, 25); ?>...
                </div>
                <div class="pop" id="p<?= $row['id']; ?>">
                <h3 style="color: skyblue;"><?=$row['title'];?></h3>
                    <pre><?= $row['news']; ?></pre>
                </div>
            </td>
            <td></td>
        </tr>
    <?php
            }
    ?>
    </tr>
    </table>
    <div>
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='index.php?do=pop&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px;';
            echo "<a href='index.php?do=pop&p=$i' style='{$size}'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='index.php?do=pop&p=$next'>";
            echo ">";
            echo "</a>";
        }
        ?>
</fieldset>
<script>
    $(".title").hover(
        function () {
            $(".pop").hide();
            let id=$(this).data("id");
            $("#p"+id).show();
        }
        )
        
</script>
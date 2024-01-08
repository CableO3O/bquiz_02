<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <table style="width: 95%; margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width="20%"></th>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td>
                    <div class="title" data-id="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </div>
                </td>
                <td>
                    <div id="s<?=$row['id']; ?>">
                        <?= mb_substr($row['news'], 0, 25); ?>...
                    </div>
                    <div id="a<?=$row['id']; ?>" style="display: none;">
                        <?= $row['news']; ?>...
                    </div>
                </td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='index.php?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px;';
            echo "<a href='index.php?do=news&p=$i' style='{$size}'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='index.php?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }
        ?>
</fieldset>
<script>
    // function () { $(this)    }) 等於 (e)=>{$(e.target)}
$(".title").on('click',(e)=>{
    let id=$(e.target).data('id');
    $("#s"+id).toggle();
    $("#a"+id).toggle();
})
</script>
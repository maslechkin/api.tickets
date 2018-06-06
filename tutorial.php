<?php
$tutorial = (new \Classes\Tutorial())->getData();
?>
<table border="1">
    <tr>
        <th>№</th>
        <th>Method</th>
        <th>Request</th>
        <th>Params</th>
        <th>Description</th>
    </tr>

    <?php foreach ($tutorial as $id => $item) { ?>
        <td>
        <td><?= $id; ?></td>
        <td><?= !empty($item[\Classes\Tutorial::ROW_METHOD]) ? $item[\Classes\Tutorial::ROW_METHOD] : ''; ?></td>
        <td><?= !empty($item[\Classes\Tutorial::ROW_REQUEST]) ? $item[\Classes\Tutorial::ROW_REQUEST] : ''; ?></td>
        <td><?= !empty($item[\Classes\Tutorial::ROW_PARAMS]) ? $item[\Classes\Tutorial::ROW_PARAMS] : ''; ?></td>
        <td><?= !empty($item[\Classes\Tutorial::ROW_DESCRIPTION]) ? $item[\Classes\Tutorial::ROW_DESCRIPTION] : ''; ?></td>

        </tr>
    <?php } ?>
</table>

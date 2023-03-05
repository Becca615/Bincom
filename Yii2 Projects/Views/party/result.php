<?php
/** @var yii\web\View $this */
?>

<form>
    <label>Select Party</label>
    <select id="party_name" name="party_name">
        <?php foreach ($partys as $party): ?>
            <option value="<?= $party->name ?>">
                <?= $party->name ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Submit">
</form>
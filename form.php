<?php /* Hotel Registration Form */ ?>
<h2><?= $edit ? 'Edit' : 'Hotel' ?> Registration Form</h2>
<?php if ($errors): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $e): ?><li><?= $e ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($success): ?>
    <div class="success"> <?= $success ?> </div>
<?php endif; ?>
<form method="post" action="">
    <label>Name*<input type="text" name="name" value="<?= $fields['name'] ?>" required></label>
    <label>Email*<input type="email" name="email" value="<?= $fields['email'] ?>" required></label>
    <label>Phone*<input type="text" name="phone" value="<?= $fields['phone'] ?>" required></label>
    <label>Address*<input type="text" name="address" value="<?= $fields['address'] ?>" required></label>
    <label>Room Type*
        <select name="room_type" required>
            <option value="">Select</option>
            <option value="Single" <?= $fields['room_type']=='Single'?'selected':'' ?>>Single</option>
            <option value="Double" <?= $fields['room_type']=='Double'?'selected':'' ?>>Double</option>
            <option value="Suite" <?= $fields['room_type']=='Suite'?'selected':'' ?>>Suite</option>
        </select>
    </label>
    <label>Check-in Date*<input type="date" name="check_in" value="<?= $fields['check_in'] ?>" required></label>
    <label>Check-out Date*<input type="date" name="check_out" value="<?= $fields['check_out'] ?>" required></label>
    <label>Number of Guests*<input type="number" name="guests" min="1" value="<?= $fields['guests'] ?>" required></label>
    <label>Special Requests<textarea name="special_requests"><?= $fields['special_requests'] ?></textarea></label>
    <label>Payment Method*
        <select name="payment_method" required>
            <option value="">Select</option>
            <option value="Credit Card" <?= $fields['payment_method']=='Credit Card'?'selected':'' ?>>Credit Card</option>
            <option value="Cash" <?= $fields['payment_method']=='Cash'?'selected':'' ?>>Cash</option>
            <option value="Online" <?= $fields['payment_method']=='Online'?'selected':'' ?>>Online</option>
        </select>
    </label>
    <?php if ($edit): ?>
        <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
    <?php endif; ?>
    <button type="submit"><?= $edit ? 'Update' : 'Register' ?></button>
</form> 
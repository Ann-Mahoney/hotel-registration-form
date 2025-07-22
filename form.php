<?php /* Hotel Registration Form */ ?>
<div class="form-container colored-form">
<h2 class="form-title" style="color:#fff;background:#007bff;padding:16px 0 16px 20px;border-radius:8px 8px 0 0;margin:-24px -32px 24px -32px;"> <?= $edit ? 'Edit' : 'Hotel' ?> Registration Form</h2>
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
<form method="post" action="" class="hotel-form">
    <label>Name*<input type="text" name="name" value="<?= $fields['name'] ?>" required class="input-field"></label>
    <label>Email*<input type="email" name="email" value="<?= $fields['email'] ?>" required class="input-field"></label>
    <label>Phone*<input type="text" name="phone" value="<?= $fields['phone'] ?>" required class="input-field"></label>
    <label>Address*<input type="text" name="address" value="<?= $fields['address'] ?>" required class="input-field"></label>
    <label>Room Type*
        <select name="room_type" required class="input-field">
            <option value="">Select</option>
            <option value="Single" <?= $fields['room_type']=='Single'?'selected':'' ?>>Single</option>
            <option value="Double" <?= $fields['room_type']=='Double'?'selected':'' ?>>Double</option>
            <option value="Suite" <?= $fields['room_type']=='Suite'?'selected':'' ?>>Suite</option>
        </select>
    </label>
    <label>Check-in Date*<input type="date" name="check_in" value="<?= $fields['check_in'] ?>" required class="input-field"></label>
    <label>Check-out Date*<input type="date" name="check_out" value="<?= $fields['check_out'] ?>" required class="input-field"></label>
    <label>Number of Guests*<input type="number" name="guests" min="1" value="<?= $fields['guests'] ?>" required class="input-field"></label>
    <label>Special Requests<textarea name="special_requests" class="input-field"><?= $fields['special_requests'] ?></textarea></label>
    <label>Payment Method*
        <select name="payment_method" required class="input-field">
            <option value="">Select</option>
            <option value="Credit Card" <?= $fields['payment_method']=='Credit Card'?'selected':'' ?>>Credit Card</option>
            <option value="Cash" <?= $fields['payment_method']=='Cash'?'selected':'' ?>>Cash</option>
            <option value="Online" <?= $fields['payment_method']=='Online'?'selected':'' ?>>Online</option>
        </select>
    </label>
    <?php if ($edit): ?>
        <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
    <?php endif; ?>
    <button type="submit" class="submit-btn full-width-btn"><?= $edit ? 'Update' : 'Register' ?></button>
</form>
</div> 
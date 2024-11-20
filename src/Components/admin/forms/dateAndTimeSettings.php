<form action="/app/settings/general-settings" method="post" class="py-2 dateTime">
    <div class="d-flex justify-content-center flex-wrap gap-4 mb-4">
        <div>
            <?= DATE_FORMAT ?>
        </div>
        <div class="d-flex">
            <div class="form-check form-check-inline">
                <input class="form-check-input cursor_pointer" type="radio" name="dateFormat" id="dateFormat1" value="MM-DD-YYYY" <?= $dateFormat == "MM-DD-YYYY" ? 'checked' : '' ?>>
                <label class="form-check-label cursor_pointer fs-7" for="dateFormat1">mm-dd-yyyy</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input cursor_pointer" type="radio" name="dateFormat" id="dateFormat2" value="DD-MM-YYYY" <?= $dateFormat == "DD-MM-YYYY" ? 'checked' : '' ?>>
                <label class="form-check-label cursor_pointer fs-7" for="dateFormat2">dd-mm-yyyy</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap gap-4 mb-4">
        <div>
            <?= CLOCK_TYPE ?>
        </div>
        <div class="d-flex">
            <div class="form-check form-check-inline">
                <input class="form-check-input cursor_pointer" type="radio" name="clockType" id="clockType1" value="12" <?= $clock_type == "12" ? 'checked' : '' ?>>
                <label class="form-check-label cursor_pointer fs-7" for="clockType1">12 <?= HOURS ?></label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input cursor_pointer" type="radio" name="clockType" id="clockType2" value="24" <?= $clock_type == "24" ? 'checked' : '' ?>>
                <label class="form-check-label cursor_pointer fs-7" for="clockType2">24 <?= HOURS ?></label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-wrap gap-4 mb-4">
        <div>
            <?= TIMEZONE ?>
        </div>
        <div>
            <select class="form-select" id="timezone-select">
                <?php
                $timezones = DateTimeZone::listIdentifiers();

                foreach ($timezones as $timezone) {
                    $offset = (new DateTimeZone($timezone))->getOffset(new DateTime()) / 3600;

                    echo "<option value=\"$timezone\">$timezone</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-sm btn-primary"><?= SAVE_CHANGES ?></button>
    </div>
</form>
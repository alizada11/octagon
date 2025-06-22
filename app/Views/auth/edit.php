<?= $this->extend('dashboard') ?>
<?= $this->section('title') ?>
<?= lang('app.title') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<head>
    <style>
        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard .btn.disabled,
        .stepwizard .btn[disabled],
        .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
</head>

<div class="card">
    <div class="card-header">
        <h4><?= lang('app.edit_user') ?></h4>
    </div>
    <div class="card-body">
        <form id="myForm" action="<?= base_url('user/edit/' . enc($user['id'])) ?>" method="POST" class="w3-container">

            <div class="form-group">
                <label for="cr" class="form-label"><?= lang('app.cr') ?></label>
                <input type="text" class="form-control" id="cr" name="cr" required placeholder="<?= lang('app.cr_title') ?>" value="<?= esc($user['cr']) ?>">
                <div class="invalid-feedback">Please provide a valid cr.</div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label"><?= lang('app.email') ?></label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="<?= lang('app.email_title') ?>" value="<?= esc($user['email']) ?>">
                <div class="invalid-feedback">Please provide a valid email.</div>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label"><?= lang('app.phone_name') ?></label>
                <input type="text" class="form-control" id="phone" name="phone" required placeholder="<?= lang('app.phone_title') ?>" value="<?= esc($user['phone']) ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);">
                <div class="invalid-feedback">Please provide your phone number.</div>
            </div>
            <div class="form-group">
                <label for="type" class="form-label"><?= lang('app.type') ?></label>
                <select name="type" id="type" class="form-control">
                    <option value="eCommerce" <?= $user['type'] == 'eCommerce' ? 'selected' : '' ?>><?= lang('app.eCommerce') ?></option>
                    <option value="logistics" <?= $user['type'] == 'logistics' ? 'selected' : '' ?>><?= lang('app.logistics') ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="sub_type" class="form-label"><?= lang('app.sub_type') ?></label>
                <select name="sub_type" id="sub_type" class="form-control">
                    <?php if ($user['type'] == 'eCommerce'): ?>
                        <option value="b2b" <?= $user['sub_type'] == 'b2b' ? 'selected' : '' ?>><?= lang('app.b2b') ?></option>
                        <option value="b2c" <?= $user['sub_type'] == 'b2c' ? 'selected' : '' ?>><?= lang('app.b2c') ?></option>
                        <option value="c2c" <?= $user['sub_type'] == 'c2c' ? 'selected' : '' ?>><?= lang('app.c2c') ?></option>
                    <?php else: ?>
                        <option value="1pl" <?= $user['sub_type'] == '1pl' ? 'selected' : '' ?>><?= lang('app.1pl') ?></option>
                        <option value="2pl" <?= $user['sub_type'] == '2pl' ? 'selected' : '' ?>><?= lang('app.2pl') ?></option>
                        <option value="3pl" <?= $user['sub_type'] == '3pl' ? 'selected' : '' ?>><?= lang('app.3pl') ?></option>
                        <option value="4pl" <?= $user['sub_type'] == '4pl' ? 'selected' : '' ?>><?= lang('app.4pl') ?></option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label"><?= lang('app.access') ?></label>
                <textarea id="ms1" name="role" class="form-control"></textarea>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?= lang('app.submit') ?></button>
        </form>
    </div>
</div>


<script>
    // Initialize multi-select plugin
    jQuery(document).ready(function($) {

        var ms1 = $('#ms1').magicSuggest({
            data: [
                <?php foreach (lang('app.roles') as $roleCode => $roleData): ?> {
                        code: '<?= $roleCode ?>',
                        name: '<?= $roleData ?>'
                    },
                <?php endforeach; ?>
            ],
            valueField: 'code',
            displayField: 'name',
            maxSelection: null,
            allowFreeEntries: false,
            toggleOnClick: true
        });

        // Set all emails as selected values
        var selectedSids = <?= json_encode(explode(',', $user['role'])) ?>;
        ms1.setValue(selectedSids);

        // Type change handler
        $('#type').change(function() {
            var selectedType = $(this).val();
            var subTypeOptions;

            if (selectedType === 'eCommerce') {
                subTypeOptions = `
                <option value="b2b"><?= lang('app.b2b') ?></option>
                <option value="b2c"><?= lang('app.b2c') ?></option>
                <option value="c2c"><?= lang('app.c2c') ?></option>
            `;
            } else {
                subTypeOptions = `
                <option value="1pl"><?= lang('app.1pl') ?></option>
                <option value="2pl"><?= lang('app.2pl') ?></option>
                <option value="3pl"><?= lang('app.3pl') ?></option>
                <option value="4pl"><?= lang('app.4pl') ?></option>
            `;
            }

            $('#sub_type').html(subTypeOptions);
        });
    });
</script>
<?= $this->endSection() ?>
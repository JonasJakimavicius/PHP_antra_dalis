<?php if (isset($data) && !empty($data)): ?>
    <form <?php print html_attr(($data['attr']) + ['method' => 'post']); ?>>

        <?php if (isset ($data['fields'])): ?>
            <div class="input-container">

                <?php foreach ($data['fields'] ?? [] as $field_id => $field): ?>

                    <?php if (isset($field['label'])) : ?>
                        <label>
                        <?php print $field['label']; ?>
                    <?php endif; ?>

                    <?php if ($field['type'] === 'select'): ?>
                        <select <?php print html_attr(['name' => $field_id] + $field['attr']); ?>>
                            <?php foreach ($field['options'] as $select_value_id => $select_value): ?>
                                <option value="<?php print $select_value_id; ?>"> <?php print $select_value; ?> </option>
                            <?php endforeach; ?>
                        </select>

                    <?php else: ?>
                        <input <?php print html_attr(['name' => $field_id, 'type' => $field['type']] + $field['attr'] ?? []); ?>>
                    <?php endif; ?>

                    <?php if (isset($field['error'])): ?>
                        <div class="error"> <?php print $field['error']; ?></div>
                    <?php endif; ?>


                    <?php if (isset($field['label'])) : ?>
                        </label>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($data['error'])): ?>
            <div> <?php print $data['error']; ?></div>
        <?php endif; ?>

        <?php if (isset ($data['buttons'])): ?>
            <div class="buttons-container">

                <?php foreach ($data['buttons'] ?? [] as $button_id => $button): ?>
                    <input <?php print html_attr($button); ?><?php print $data['buttons']['button']['value']; ?> ></input>
                <?php endforeach; ?>

                <?php if (isset($data['message'])): ?>
                    <div><?php print $data['message']; ?></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </form>
<?php endif; ?>
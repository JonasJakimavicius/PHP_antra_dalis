<?php if (isset($form) && !empty($form)): ?>
    <form <?php print html_attr(($form['attr']) + ['method' => 'post']); ?>>

        <?php if (isset ($form['fields'])): ?>
            <div class="input-container">

                <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

                    <?php if (isset($field['label'])) : ?>
                        <label>
                        <?php print $field['label']; ?>
                    <?php endif; ?>

                    <?php if ($field['type'] === 'select'): ?>
                        <select <?php print html_attr(['name' => $field_id] + $field['attr']); ?>>
                            <option disabled selected>Pasirink komanda</option>
                            <?php foreach ($field['options'] as $select_value_id => $select_value): ?>
                                <option value="<?php print $select_value_id; ?>"> <?php print $select_value; ?> </option>
                            <?php endforeach; ?>
                        </select>

                    <?php else: ?>
                        <input <?php print html_attr(['name' => $field_id, 'type' => $field['type']] + $field['attr'] ?? []); ?>>
                    <?php endif; ?>

                    <?php if (isset($field['error'])): ?>
                        <div> <?php print $field['error']; ?></div>
                    <?php endif; ?>



                    <?php if (isset($field['label'])) : ?>
                        </label>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($form['error'])): ?>
            <div> <?php print $form['error']; ?></div>
        <?php endif; ?>

        <?php if (isset ($form['buttons'])): ?>
            <div class="buttons-container">

                <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
                    <input <?php print html_attr($button); ?><?php print $form['buttons']['button']['value']; ?> ></input>
                <?php endforeach; ?>

                <?php if (isset($form['message'])): ?>
                    <div><?php print $form['message']; ?></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </form>
<?php endif; ?>
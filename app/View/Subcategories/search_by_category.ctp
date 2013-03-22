<!-- file path View/Subcategories/search_by_category.ctp -->
<?php foreach ($subcategories as $key => $value): ?>
<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>
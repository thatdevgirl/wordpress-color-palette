<h1>Color Palette Settings</h1>

<p>Use this page to set up the primary colors of your web site's style guide.</p>

<h2>Primary Colors</h2>

<p>These are the primary colors used on your site and in your brand.</p>

<form action="" method="post">
    <input type="hidden" name="hasUpdates" value="Y" />

    <section id="cp-primary">
        <?php foreach ($primaryColors as $key => $color): ?>
        
        <div class="cp-primary">
            <label>Color</label>
            
            <span>
                #<input name="primaryColors[<?php echo $key; ?>]" value="<?php echo $primaryColors[$key] ?>" />
            </span>
            
            <a href="#" class="cp-primary--del">x</a>
        </div>
        
        <?php endforeach; ?>
    </section>

    <a href="#" class="cp-primary--add">Add Color</a>

    <input type="submit" value="Create Palette" />
</form>
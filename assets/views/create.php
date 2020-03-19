<?php
include('assets/includes/header.php')
?>
<h1>Create</h1>


<button class="create_btn">Create pad</button>
<a href="index.php?page=create">reset</a>



<div class="wrapper">

    <form action="assets/handlers/add_presets.php" method="get">
        <div class="create_area keys"></div>
        <input type="text" name="preset_name" placeholder="Enter preset name..." required>
        <input type="submit" value="Create preset">
    </form>
    </form>
</div>

<?php
include('assets/includes/footer.php')
?>
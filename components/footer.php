<footer>
    <div class="left">
        <p>&copy Esa Leino 2023
        </p>
    </div>
</footer>
<?php
if (isset($js))
{
    foreach ($js as $script)
    {
        echo '<script type="module" src="' . JS . $script . '"></script>';
    }
}
?>
</body>
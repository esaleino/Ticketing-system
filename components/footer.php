<footer>
    <div class="left">
        <p>&copy 2023 Ticketing-system
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
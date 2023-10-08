<footer>
    <div class="left">
        <p>&copy Esa Leino 2023
        </p>
    </div>
</footer>
<?php
if (isset($js))
{
    echo '
<script src="' . $scripts_path . $page . '.js"></script>';
}
?>
</body>
<?php
function url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    $base = explode("/", $_SERVER['REQUEST_URI'], 3);
    $base = $base[0];
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . '/' . $base;
}

$id = $_POST['id'];
?>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex w-100">
            <blockquote class="bg-primary" style="color:white" id="link"><?= url() . 'index.php?p=share&id=' . $id ?></blockquote>
        </div>
    </div>

</div>
<div class="modal-footer display p-0 m-0">
    <button type="button" class="btn btn-primary" type="button" onclick="copyToClipboard('#link')"><i class="fa fa-copy"></i> Copy to Clip Board</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        $.toast({
            text: "Link Copied",
            heading: "success",
            showHideTransition: "slide",
            position: "top-right",
            loaderBg: "#1ea69a",
            hideAfter: 3e3,
            stack: 2
        })
    }
</script>
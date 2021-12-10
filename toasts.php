<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_registered">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['registered'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_database_error">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['database_error'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        if('<?php echo isset($_SESSION['registered']) ?>' == 1)
        {
            var registered = document.getElementById('toast_registered');
            var toast = new bootstrap.Toast(registered);
            toast.show();
            '<?php unset($_SESSION['registered']) ?>'
        }
        else if('<?php echo isset($_SESSION['database_error']) ?>' == 1)
        {
            var registration_error = document.getElementById('toast_database_error');
            var toast = new bootstrap.Toast(registration_error);
            toast.show();
            '<?php unset($_SESSION['database_error']) ?>'
        }
    });
</script>
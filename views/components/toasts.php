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

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_update_name">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['update_name'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_update_password">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['update_password'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_add_blog">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['Blog_added'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_delete_blog">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['blog_deleted'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_update_blog">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['blog_updated'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_comment_added">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['comment_added'] ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast_profile_pic_updated">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $_SESSION['update_profile_pic'] ?>
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
        else if('<?php echo isset($_SESSION['update_name']) ?>' == 1)
        {
            var update_name = document.getElementById('toast_update_name');
            var toast = new bootstrap.Toast(update_name);
            toast.show();
            '<?php unset($_SESSION['update_name']) ?>'
        }
        else if('<?php echo isset($_SESSION['update_password']) ?>' == 1)
        {
            var update_password = document.getElementById('toast_update_password');
            var toast = new bootstrap.Toast(update_password);
            toast.show();
            '<?php unset($_SESSION['update_password']) ?>'
        }
        else if('<?php echo isset($_SESSION['Blog_added']) ?>' == 1)
        {
            var Blog_added = document.getElementById('toast_add_blog');
            var toast = new bootstrap.Toast(Blog_added);
            toast.show();
            '<?php unset($_SESSION['Blog_added']) ?>'
        }
        else if('<?php echo isset($_SESSION['blog_deleted']) ?>' == 1)
        {
            var blog_deleted = document.getElementById('toast_delete_blog');
            var toast = new bootstrap.Toast(blog_deleted);
            toast.show();
            '<?php unset($_SESSION['blog_deleted']) ?>'
        }
        else if('<?php echo isset($_SESSION['blog_updated']) ?>' == 1)
        {
            var blog_updated = document.getElementById('toast_update_blog');
            var toast = new bootstrap.Toast(blog_updated);
            toast.show();
            '<?php unset($_SESSION['blog_updated']) ?>'
        }
        else if('<?php echo isset($_SESSION['comment_added']) ?>' == 1)
        {
            var comment_added = document.getElementById('toast_comment_added');
            var toast = new bootstrap.Toast(comment_added);
            toast.show();
            '<?php unset($_SESSION['comment_added']) ?>'
        }
        else if('<?php echo isset($_SESSION['update_profile_pic']) ?>' == 1)
        {
            var update_profile_pic = document.getElementById('toast_profile_pic_updated');
            var toast = new bootstrap.Toast(update_profile_pic);
            toast.show();
            '<?php unset($_SESSION['update_profile_pic']) ?>'
        }
    });
</script>